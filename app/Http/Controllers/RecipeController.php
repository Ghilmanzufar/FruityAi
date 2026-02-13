<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;
use App\Services\GroqService; // 1. IMPORT SERVICE

class RecipeController extends Controller
{
    protected $groqService;

    // 2. PASANG SERVICE DI CONSTRUCTOR
    public function __construct(GroqService $groqService)
    {
        $this->groqService = $groqService;
    }

    // Halaman Katalog (Semua Resep)
    public function index(Request $request)
    {
        $query = Recipe::query();

        if ($request->has('ingredient')) {
            $query->where('main_ingredient', $request->ingredient);
        }

        $recipes = $query->get();
        return view('recipes.index', compact('recipes'));
    }

    // Halaman Detail
    public function show($slug)
    {
        $recipe = Recipe::where('slug', $slug)->firstOrFail();
        return view('recipes.show', compact('recipe'));
    }

    public function create()
    {
        return view('recipes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'main_ingredient' => 'required|string',
            'image' => 'required|image|max:5120',
            'cooking_time' => 'required|integer',
            'calories' => 'nullable|integer',
            'description' => 'required|string',
            'ingredients' => 'required|array',
            'steps' => 'required|array',
        ]);

        $imagePath = $request->file('image')->store('recipes', 'public');
        $imageUrl = asset('storage/' . $imagePath);
        $slug = \Str::slug($request->title) . '-' . time();

        Recipe::create([
            'title' => $request->title,
            'slug' => $slug,
            'main_ingredient' => strtolower($request->main_ingredient),
            'image_url' => $imageUrl,
            'description' => $request->description,
            'cooking_time' => $request->cooking_time,
            'calories' => $request->calories,
            'ingredients' => $request->ingredients, 
            'steps' => $request->steps,
        ]);

        return redirect()->route('recipes.index')->with('success', 'Resep berhasil ditambahkan!');
    }

    // --- BAGIAN UTAMA PENCARIAN ---

    public function search(Request $request)
    {
        $ingredients = $request->input('ingredients', []); 
        
        if (empty($ingredients)) {
            return redirect()->route('scan.index')->withErrors(['msg' => 'Pilih setidaknya satu bahan!']);
        }

        // 1. CARI DI DATABASE SENDIRI (CEPAT)
        $recipes = Recipe::whereIn('main_ingredient', $ingredients)->get();

        // 2. SIAPKAN BAHAN UNTUK AI (Dikirim ke View, bukan diproses disini)
        // Kita gabungkan array jadi string koma: "pisang, mangga"
        $searchQuery = implode(', ', $ingredients);

        // Kirim $recipes (DB) dan $searchQuery (Bahan) ke View
        return view('recipes.index', compact('recipes', 'searchQuery'));
    }

    // --- METHOD BARU: KHUSUS DIPANGGIL JAVASCRIPT (AJAX) ---
    public function generateAiRecipes(Request $request)
    {
        // 1. Ambil bahan dari kiriman JS
        $ingredient = $request->input('ingredient');
        
        // 2. Panggil Groq Service
        // Ini butuh waktu 3-5 detik, makanya dipisah biar halaman gak macet
        $aiData = $this->groqService->generateRecipes($ingredient);

        // 3. Kembalikan format JSON murni ke JavaScript
        return response()->json($aiData);
    }

    // --- EDIT & DELETE ---

    public function edit(Recipe $recipe)
    {
        return view('recipes.edit', compact('recipe'));
    }

    public function update(Request $request, Recipe $recipe)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'main_ingredient' => 'required|string',
            'image' => 'nullable|image|max:5120',
            'cooking_time' => 'required|integer',
            'calories' => 'nullable|integer',
            'description' => 'required|string',
            'ingredients' => 'required|array',
            'steps' => 'required|array',
        ]);

        $data = [
            'title' => $request->title,
            'slug' => \Str::slug($request->title) . '-' . time(),
            'main_ingredient' => strtolower($request->main_ingredient),
            'description' => $request->description,
            'cooking_time' => $request->cooking_time,
            'calories' => $request->calories,
            'ingredients' => $request->ingredients,
            'steps' => $request->steps,
        ];

        if ($request->hasFile('image')) {
            $oldPath = str_replace(asset('storage/'), '', $recipe->image_url);
            \Illuminate\Support\Facades\Storage::disk('public')->delete($oldPath);
            $imagePath = $request->file('image')->store('recipes', 'public');
            $data['image_url'] = asset('storage/' . $imagePath);
        }

        $recipe->update($data);

        return redirect()->route('recipes.index')->with('success', 'Resep berhasil diperbarui!');
    }

    public function destroy(Recipe $recipe)
    {
        $oldPath = str_replace(asset('storage/'), '', $recipe->image_url);
        \Illuminate\Support\Facades\Storage::disk('public')->delete($oldPath);
        $recipe->delete();

        return redirect()->route('recipes.index')->with('success', 'Resep berhasil dihapus!');
    }

    // ... dalam RecipeController.php

    // METHOD BARU: MENAMPILKAN DETAIL RESEP AI (TANPA SAVE DB)
    public function previewAi(Request $request)
    {
        // 1. Ambil data yang dikirim dari Form JavaScript
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'cooking_time' => 'required',
            'calories' => 'nullable',
            'ingredients' => 'required', // Ini akan berupa array karena dikirim form
            'steps' => 'required',
        ]);

        // 2. Ubah Array menjadi Object (Dummy Model)
        // Tujuannya: Supaya view 'recipes.show' tidak error saat panggil $recipe->title
        $recipe = (object) [
            'id' => null, // ID null tandanya ini belum disimpan
            'title' => $data['title'],
            'slug' => 'ai-generated',
            'main_ingredient' => 'ai-generated',
            // Gunakan placeholder image jika tidak ada gambar
            'image_url' => 'https://placehold.co/800x600/e2e8f0/10b981?text=' . urlencode($data['title']),
            'description' => $data['description'],
            'cooking_time' => $data['cooking_time'],
            'calories' => $data['calories'] ?? 0,
            // Pastikan ingredients & steps tetap array
            'ingredients' => is_array($data['ingredients']) ? $data['ingredients'] : json_decode($data['ingredients']),
            'steps' => is_array($data['steps']) ? $data['steps'] : json_decode($data['steps']),
        ];

        // 3. Tampilkan View yang SAMA dengan resep biasa
        return view('recipes.show', compact('recipe'));
    }

    // SIMPAN RESEP AI KE DATABASE PERMANEN
    public function storeAi(Request $request)
    {
        // 1. Buat Slug Unik
        $slug = \Str::slug($request->title) . '-' . time();

        // 2. Simpan ke Database
        // Kita tidak perlu upload gambar karena sudah berupa URL (Placehold.co atau Unsplash)
        $recipe = Recipe::create([
            'title' => $request->title,
            'slug' => $slug,
            'main_ingredient' => $request->main_ingredient ?? 'mixed',
            'image_url' => $request->image_url,
            'description' => $request->description,
            'cooking_time' => $request->cooking_time,
            'calories' => $request->calories,
            'ingredients' => $request->ingredients, // Otomatis jadi JSON
            'steps' => $request->steps,             // Otomatis jadi JSON
        ]);

        // 3. Redirect ke Halaman Detail ASLI (Sekarang sudah punya ID & Slug permanen)
        return redirect()->route('recipes.show', $recipe->slug)
                        ->with('success', 'Berhasil! Resep AI sudah disimpan ke koleksi dapurmu.');
    }
}