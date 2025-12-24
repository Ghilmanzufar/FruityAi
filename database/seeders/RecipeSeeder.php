<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecipeSeeder extends Seeder
{
    public function run()
    {
        // Bersihkan tabel dulu biar tidak duplikat (Opsional)
        // DB::table('recipes')->truncate(); 

        $recipes = [
            // 1. PISANG (Banana)
            [
                'title' => 'Pisang Goreng Pasir Crispy',
                'slug' => 'pisang-goreng-pasir',
                'main_ingredient' => 'banana',
                'image_url' => 'https://images.unsplash.com/photo-1603083506141-840938f98c77?q=80&w=600&auto=format&fit=crop',
                'description' => 'Camilan sore favorit keluarga. Pisang manis dengan balutan tepung panir yang renyah.',
                'calories' => 280,
                'cooking_time' => 20,
                'ingredients' => json_encode(['5 buah Pisang Kepok', '5 sdm Tepung Terigu', 'Tepung Panir secukupnya', 'Air & Garam', 'Minyak Goreng']),
                'steps' => json_encode(['Campur tepung terigu, air, dan garam (adonan basah).', 'Celupkan pisang ke adonan basah.', 'Gulingkan di tepung panir.', 'Goreng hingga kuning keemasan.'])
            ],
            // 2. MANGGA (Mango) - Sambal
            [
                'title' => 'Sambal Pencit (Mangga Muda)',
                'slug' => 'sambal-mangga-muda',
                'main_ingredient' => 'mango',
                'image_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/58/Sambal_mangga_2.jpg/800px-Sambal_mangga_2.jpg', 
                'description' => 'Pelengkap makan siang yang segar dan pedas. Cocok teman ikan bakar.',
                'calories' => 90,
                'cooking_time' => 10,
                'ingredients' => json_encode(['1 buah Mangga Muda (Serut)', '5 Cabe Rawit Merah', '1 sdt Terasi Bakar', 'Garam & Gula Merah']),
                'steps' => json_encode(['Ulek cabe, terasi, garam, dan gula merah.', 'Masukkan serutan mangga muda.', 'Aduk rata sambil ditekan sedikit agar sari mangga keluar.'])
            ],
            // 3. MANGGA (Mango) - Dessert
            [
                'title' => 'Mango Sago Creamy',
                'slug' => 'mango-sago',
                'main_ingredient' => 'mango',
                'image_url' => 'https://images.unsplash.com/photo-1623592868200-aa465610b2df?q=80&w=600&auto=format&fit=crop',
                'description' => 'Dessert kekinian yang manis dan creamy dengan butiran sagu mutiara.',
                'calories' => 350,
                'cooking_time' => 30,
                'ingredients' => json_encode(['2 buah Mangga Harum Manis', '100gr Sagu Mutiara', '200ml Susu Evaporasi', 'Susu Kental Manis', 'Jelly Mangga']),
                'steps' => json_encode(['Rebus sagu mutiara sampai bening.', 'Blender 1 buah mangga dengan sedikit susu.', 'Potong dadu 1 buah mangga sisanya.', 'Campur jus mangga, sagu, potongan mangga, dan susu evaporasi. Dinginkan.'])
            ],
            // 4. BUAH NAGA (Dragonfruit)
            [
                'title' => 'Puding Buah Naga Susu',
                'slug' => 'puding-buah-naga',
                'main_ingredient' => 'dragonfruit',
                'image_url' => 'https://images.unsplash.com/photo-1622359747963-c625867d3e02?q=80&w=600&auto=format&fit=crop',
                'description' => 'Puding sehat dengan warna alami yang cantik. Kaya antioksidan.',
                'calories' => 120,
                'cooking_time' => 40,
                'ingredients' => json_encode(['1 buah Buah Naga Merah (Blender)', '1 bungkus Agar-agar Plain', '700ml Susu Cair', 'Gula Pasir secukupnya']),
                'steps' => json_encode(['Campur agar-agar, gula, dan susu di panci.', 'Masak hingga mendidih.', 'Matikan api, masukkan jus buah naga.', 'Aduk rata, tuang ke cetakan. Dinginkan.'])
            ],
            // 5. ALPUKAT (Avocado)
            [
                'title' => 'Avocado Toast Telur',
                'slug' => 'avocado-toast-indo',
                'main_ingredient' => 'avocado',
                'image_url' => 'https://images.unsplash.com/photo-1588137372308-15f75323ca8d?q=80&w=600&auto=format&fit=crop',
                'description' => 'Sarapan sehat dan praktis. Mengenyangkan dan kaya lemak baik.',
                'calories' => 320,
                'cooking_time' => 10,
                'ingredients' => json_encode(['1 buah Alpukat Mentega', '2 lembar Roti Gandum', '1 butir Telur Ceplok/Rebus', 'Lada & Garam']),
                'steps' => json_encode(['Panggang roti hingga garing.', 'Lumatkan alpukat, beri bumbu.', 'Oleskan di atas roti.', 'Tambahkan telur di atasnya.'])
            ],
            // 6. NANAS (Pineapple)
            [
                'title' => 'Es Nanas Timun Serut',
                'slug' => 'es-nanas-timun',
                'main_ingredient' => 'pineapple',
                'image_url' => 'https://images.unsplash.com/photo-1546173159-315724a31696?q=80&w=600&auto=format&fit=crop',
                'description' => 'Minuman super segar untuk cuaca panas. Perpaduan asam manis.',
                'calories' => 150,
                'cooking_time' => 15,
                'ingredients' => json_encode(['1/2 buah Nanas (potong kecil)', '1 buah Timun (serut)', 'Sirup Melon/Gula', 'Es Batu', 'Air Jeruk Nipis']),
                'steps' => json_encode(['Rebus nanas dengan sedikit gula sebentar (opsional).', 'Campur serutan timun dan nanas.', 'Tambahkan sirup, air, dan es batu.', 'Beri perasan jeruk nipis.'])
            ],
            // 7. SEMANGKA (Watermelon)
            [
                'title' => 'Es Semangka Susu Viral',
                'slug' => 'es-semangka-susu',
                'main_ingredient' => 'watermelon',
                'image_url' => 'https://images.unsplash.com/photo-1589984662646-e7b2e4962f18?q=80&w=600&auto=format&fit=crop',
                'description' => 'Minuman buka puasa yang segar dengan potongan semangka melimpah.',
                'calories' => 180,
                'cooking_time' => 10,
                'ingredients' => json_encode(['1/4 buah Semangka (cacah kecil)', 'Sirup Cocopandan', 'Susu Cair Full Cream', 'Es Batu']),
                'steps' => json_encode(['Potong semangka kecil-kecil.', 'Tuang sirup cocopandan ke gelas.', 'Masukkan es batu dan semangka.', 'Siram dengan susu cair. Aduk rata.'])
            ],
            // 8. DURIAN (Durian)
            [
                'title' => 'Pancake Durian Medan',
                'slug' => 'pancake-durian',
                'main_ingredient' => 'durian',
                'image_url' => 'https://asset.kompas.com/crops/O_5c5x086z-n6e5X52f2f3e4-8=/0x0:1000x667/750x500/data/photo/2020/06/19/5eec6c0b380f2.jpg',
                'description' => 'Kulit dadar tipis membungkus daging durian asli dan whipped cream.',
                'calories' => 400,
                'cooking_time' => 45,
                'ingredients' => json_encode(['Daging Durian Halus', 'Whipped Cream', 'Tepung Terigu', 'Telur & Susu (untuk kulit)', 'Pewarna Makanan Hijau/Kuning']),
                'steps' => json_encode(['Buat dadar tipis dari campuran tepung, telur, susu.', 'Ambil selembar kulit, oles whipped cream.', 'Taruh daging durian di tengah.', 'Lipat seperti amplop. Simpan di kulkas.'])
            ],
            // 9. NANGKA (Jackfruit)
            [
                'title' => 'Kolak Pisang Nangka',
                'slug' => 'kolak-pisang-nangka',
                'main_ingredient' => 'jackfruit',
                'image_url' => 'https://asset.kompas.com/crops/X4-4-2665-6546-5645-564/0x0:1000x667/750x500/data/photo/2020/04/24/5ea2a6e0266e7.jpg',
                'description' => 'Takjil legendaris. Wangi nangka membuat kolak semakin nikmat.',
                'calories' => 300,
                'cooking_time' => 40,
                'ingredients' => json_encode(['10 biji Nangka (potong)', '2 buah Pisang Tanduk', 'Santan', 'Gula Merah', 'Daun Pandan']),
                'steps' => json_encode(['Rebus air, gula merah, dan pandan.', 'Masukkan pisang, masak hingga empuk.', 'Tuang santan sambil diaduk.', 'Terakhir masukkan nangka, masak sebentar saja.'])
            ],
            // 10. SUKUN (Breadfruit)
            [
                'title' => 'Sukun Goreng Bumbu Bawang',
                'slug' => 'sukun-goreng',
                'main_ingredient' => 'breadfruit',
                'image_url' => 'https://asset.kompas.com/crops/6546-6546-5645-45/0x0:1000x667/750x500/data/photo/2021/11/24/619de42434234.jpg',
                'description' => 'Pengganti nasi atau camilan berat. Gurih, empuk, dan lezat.',
                'calories' => 200,
                'cooking_time' => 25,
                'ingredients' => json_encode(['1 buah Sukun Tua (Kupas, potong)', '3 siung Bawang Putih (haluskan)', 'Ketumbar & Garam', 'Air untuk rendaman']),
                'steps' => json_encode(['Campur bumbu halus dengan air.', 'Rendam potongan sukun selama 15 menit.', 'Goreng dalam minyak panas hingga kecoklatan.', 'Sajikan hangat.'])
            ],
            // 11. SIRSAK (Soursop)
            [
                'title' => 'Es Manado Sirsak',
                'slug' => 'es-manado',
                'main_ingredient' => 'soursop',
                'image_url' => 'https://i.ytimg.com/vi/q5yG6_j5_k/maxresdefault.jpg',
                'description' => 'Campuran sirsak dan aneka buah dengan kuah sirsak yang kental.',
                'calories' => 220,
                'cooking_time' => 20,
                'ingredients' => json_encode(['1 buah Sirsak (buang biji)', 'Nata de Coco', 'Jelly warna-warni', 'Susu Kental Manis', 'Es Batu']),
                'steps' => json_encode(['Blender sebagian sirsak dengan sedikit air dan gula (untuk kuah).', 'Siapkan mangkuk, isi dengan sisa sirsak suwir, nata de coco, jelly.', 'Siram dengan jus sirsak kental dan susu manis.'])
            ],
             // 12. JERUK NIPIS (Lime)
            [
                'title' => 'Es Degan Jeruk Nipis',
                'slug' => 'es-degan-jeruk-nipis',
                'main_ingredient' => 'lime',
                'image_url' => 'https://asset.kompas.com/crops/546-6456-5645/0x0:1000x667/750x500/data/photo/2022/04/14/6257d0324234.jpg',
                'description' => 'Penawar dahaga alami. Air kelapa muda dicampur perasan nipis.',
                'calories' => 80,
                'cooking_time' => 5,
                'ingredients' => json_encode(['1 butir Kelapa Muda (Air & Daging)', '2 buah Jeruk Nipis', 'Madu atau Gula Cair', 'Es Batu']),
                'steps' => json_encode(['Tuang air kelapa dan kerokan dagingnya ke gelas.', 'Beri perasan jeruk nipis.', 'Tambahkan madu/gula sesuai selera.', 'Sajikan dingin.'])
            ],
        ];

        foreach ($recipes as $recipe) {
            // Gunakan updateOrInsert agar tidak error kalau dijalankan berulang
            DB::table('recipes')->updateOrInsert(
                ['slug' => $recipe['slug']], // Cek berdasarkan slug
                array_merge($recipe, ['created_at' => now(), 'updated_at' => now()])
            );
        }
    }
}