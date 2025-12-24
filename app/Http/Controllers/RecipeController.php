<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    // Halaman Katalog (Semua Resep)
    public function index(Request $request)
    {
        $query = Recipe::query();

        // Fitur Filter: Jika ada request ?ingredient=banana
        if ($request->has('ingredient')) {
            $query->where('main_ingredient', $request->ingredient);
        }

        $recipes = $query->get();
        return view('recipes.index', compact('recipes'));
    }

    // Halaman Detail (Satu Resep)
    public function show($slug)
    {
        $recipe = Recipe::where('slug', $slug)->firstOrFail();
        return view('recipes.show', compact('recipe'));
    }

    // 1. TAMPILKAN FORM TAMBAH RESEP
    public function create()
    {
        return view('recipes.create');
    }

    // 2. SIMPAN RESEP KE DATABASE
    public function store(Request $request)
    {
        // Validasi Input
        $request->validate([
            'title' => 'required|string|max:255',
            'main_ingredient' => 'required|string',
            'image' => 'required|image|max:5120', // Max 5MB
            'cooking_time' => 'required|integer',
            'calories' => 'nullable|integer',
            'description' => 'required|string',
            'ingredients' => 'required|array', // Harus berupa array (list)
            'steps' => 'required|array',       // Harus berupa array (list)
        ]);

        // 1. Upload Gambar Masakan
        $imagePath = $request->file('image')->store('recipes', 'public');
        $imageUrl = asset('storage/' . $imagePath);

        // 2. Buat Slug Otomatis (Contoh: "Nasi Goreng" -> "nasi-goreng")
        $slug = \Str::slug($request->title) . '-' . time();

        // 3. Simpan ke Database
        Recipe::create([
            'title' => $request->title,
            'slug' => $slug,
            'main_ingredient' => strtolower($request->main_ingredient), // Simpan dalam huruf kecil
            'image_url' => $imageUrl,
            'description' => $request->description,
            'cooking_time' => $request->cooking_time,
            'calories' => $request->calories,
            // JSON_ENCODE: Mengubah Array PHP menjadi JSON String biar bisa masuk database
            'ingredients' => $request->ingredients, 
            'steps' => $request->steps,
        ]);

        // 4. Redirect dengan pesan sukses
        return redirect()->route('recipes.index')->with('success', 'Resep berhasil ditambahkan!');
    }

    public function search(Request $request)
    {
        // 1. Ambil input array (default array kosong jika tidak ada)
        $ingredients = $request->input('ingredients', []); 
        
        // Validasi: Kalau keranjang kosong, balik lagi aja
        if (empty($ingredients)) {
            return redirect()->route('scan.index')->withErrors(['msg' => 'Pilih setidaknya satu bahan!']);
        }

        // 2. Cari Resep
        // Logika: Tampilkan resep yang bahan utamanya ADA DI DALAM daftar belanja user.
        // whereIn('kolom', [array]) adalah kuncinya.
        $recipes = Recipe::whereIn('main_ingredient', $ingredients)->get();

        // (Nanti di sini kita pasang logika Groq AI jika $recipes->isEmpty())

        return view('recipes.index', compact('recipes'));
    }

    // --- FITUR EDIT & DELETE ---

    // 1. TAMPILKAN FORM EDIT
    public function edit(Recipe $recipe)
    {
        return view('recipes.edit', compact('recipe'));
    }

    // 2. PROSES UPDATE DATA
    public function update(Request $request, Recipe $recipe)
    {
        // Validasi (Image jadi nullable/tidak wajib, karena mungkin user gak ganti foto)
        $request->validate([
            'title' => 'required|string|max:255',
            'main_ingredient' => 'required|string',
            'image' => 'nullable|image|max:5120', // Nullable
            'cooking_time' => 'required|integer',
            'calories' => 'nullable|integer',
            'description' => 'required|string',
            'ingredients' => 'required|array',
            'steps' => 'required|array',
        ]);

        // Setup data yang mau diupdate
        $data = [
            'title' => $request->title,
            // Jika judul berubah, slug juga berubah (opsional, tapi disarankan)
            'slug' => \Str::slug($request->title) . '-' . time(),
            'main_ingredient' => strtolower($request->main_ingredient),
            'description' => $request->description,
            'cooking_time' => $request->cooking_time,
            'calories' => $request->calories,
            'ingredients' => $request->ingredients,
            'steps' => $request->steps,
        ];

        // Cek apakah User upload foto baru?
        if ($request->hasFile('image')) {
            // Hapus foto lama dari storage biar gak numpuk
            // (Perlu: use Illuminate\Support\Facades\Storage;)
            $oldPath = str_replace(asset('storage/'), '', $recipe->image_url);
            \Illuminate\Support\Facades\Storage::disk('public')->delete($oldPath);

            // Upload foto baru
            $imagePath = $request->file('image')->store('recipes', 'public');
            $data['image_url'] = asset('storage/' . $imagePath);
        }

        // Update Database
        $recipe->update($data);

        return redirect()->route('recipes.index')->with('success', 'Resep berhasil diperbarui!');
    }

    // 3. PROSES HAPUS
    public function destroy(Recipe $recipe)
    {
        // 1. Hapus File Foto
        $oldPath = str_replace(asset('storage/'), '', $recipe->image_url);
        \Illuminate\Support\Facades\Storage::disk('public')->delete($oldPath);

        // 2. Hapus Data Database
        $recipe->delete();

        return redirect()->route('recipes.index')->with('success', 'Resep berhasil dihapus!');
    }
}