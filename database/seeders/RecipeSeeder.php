<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecipeSeeder extends Seeder
{
    public function run()
    {
        // Data 26 Buah x 3 Resep = 78 Resep
        $recipes = [
            // --- 1. SEMANGKA ---
            [
                'title' => 'Es Semangka India Viral',
                'slug' => 'es-semangka-india',
                'main_ingredient' => 'Semangka',
                'image_url' => 'https://placehold.co/600x400/ef4444/ffffff?text=Es+Semangka+India',
                'description' => 'Minuman segar viral dengan potongan semangka dadu dan sirup manis.',
                'calories' => 120,
                'cooking_time' => 15,
                'ingredients' => json_encode(['1/4 buah Semangka', 'Sirup Cocopandan', 'Es Batu', 'Air']),
                'steps' => json_encode(['Potong semangka dadu kecil.', 'Campur sirup, air, dan es.', 'Masukkan semangka, aduk rata.'])
            ],
            [
                'title' => 'Salad Semangka Keju Feta',
                'slug' => 'salad-semangka-feta',
                'main_ingredient' => 'Semangka',
                'image_url' => 'https://placehold.co/600x400/ef4444/ffffff?text=Salad+Semangka',
                'description' => 'Perpaduan unik manisnya semangka dan gurihnya keju.',
                'calories' => 90,
                'cooking_time' => 10,
                'ingredients' => json_encode(['Semangka potong dadu', 'Keju Feta/Cheddar', 'Daun Mint', 'Olive Oil']),
                'steps' => json_encode(['Tata semangka di piring.', 'Taburi remahan keju dan mint.', 'Siram sedikit olive oil.'])
            ],
            [
                'title' => 'Sorbet Semangka Nipis',
                'slug' => 'sorbet-semangka',
                'main_ingredient' => 'Semangka',
                'image_url' => 'https://placehold.co/600x400/ef4444/ffffff?text=Sorbet+Semangka',
                'description' => 'Dessert beku lembut dari sari semangka asli.',
                'calories' => 110,
                'cooking_time' => 120, // Termasuk waktu beku
                'ingredients' => json_encode(['500gr Semangka', '1 sdm Air Jeruk Nipis', 'Madu']),
                'steps' => json_encode(['Blender semangka dan nipis.', 'Bekukan di freezer.', 'Kerok dengan garpu setiap 30 menit agar halus.'])
            ],

            // --- 2. ANGGUR ---
            [
                'title' => 'Asinan Anggur Bogor',
                'slug' => 'asinan-anggur',
                'main_ingredient' => 'Anggur',
                'image_url' => 'https://placehold.co/600x400/8b5cf6/ffffff?text=Asinan+Anggur',
                'description' => 'Anggur segar dengan kuah asinan pedas manis.',
                'calories' => 80,
                'cooking_time' => 20,
                'ingredients' => json_encode(['250gr Anggur Merah', '3 Cabe Merah', 'Gula & Cuka', 'Garam']),
                'steps' => json_encode(['Haluskan cabe, rebus dengan gula dan cuka.', 'Dinginkan kuah.', 'Siram ke potongan anggur.'])
            ],
            [
                'title' => 'Pie Buah Anggur',
                'slug' => 'pie-buah-anggur',
                'main_ingredient' => 'Anggur',
                'image_url' => 'https://placehold.co/600x400/8b5cf6/ffffff?text=Pie+Anggur',
                'description' => 'Pie renyah dengan vla vanilla dan topping anggur.',
                'calories' => 250,
                'cooking_time' => 60,
                'ingredients' => json_encode(['Kulit Pie siap pakai', 'Vla Vanilla', 'Anggur Hijau & Merah', 'Agar-agar bening']),
                'steps' => json_encode(['Panggang kulit pie.', 'Isi dengan vla.', 'Tata anggur diatasnya, oles agar-agar.'])
            ],
            [
                'title' => 'Smoothie Anggur Yogurt',
                'slug' => 'smoothie-anggur',
                'main_ingredient' => 'Anggur',
                'image_url' => 'https://placehold.co/600x400/8b5cf6/ffffff?text=Smoothie+Anggur',
                'description' => 'Minuman sehat kaya antioksidan.',
                'calories' => 150,
                'cooking_time' => 5,
                'ingredients' => json_encode(['1 cup Anggur beku', '1 cup Yogurt Plain', 'Madu']),
                'steps' => json_encode(['Masukkan semua bahan ke blender.', 'Proses hingga halus.', 'Sajikan dingin.'])
            ],

            // --- 3. APEL ---
            [
                'title' => 'Apple Pie Goreng',
                'slug' => 'apple-pie-goreng',
                'main_ingredient' => 'Apel',
                'image_url' => 'https://placehold.co/600x400/ef4444/ffffff?text=Apple+Pie',
                'description' => 'Kulit pastri renyah berisi selai apel kayu manis.',
                'calories' => 280,
                'cooking_time' => 45,
                'ingredients' => json_encode(['2 buah Apel Malang', 'Kayu Manis bubuk', 'Gula Palem', 'Kulit Puff Pastry']),
                'steps' => json_encode(['Masak apel cincang dengan gula dan kayu manis.', 'Isikan ke kulit pastry, lipat.', 'Goreng atau oven hingga matang.'])
            ],
            [
                'title' => 'Keripik Apel Oven',
                'slug' => 'keripik-apel',
                'main_ingredient' => 'Apel',
                'image_url' => 'https://placehold.co/600x400/ef4444/ffffff?text=Keripik+Apel',
                'description' => 'Camilan sehat keripik apel garing tanpa minyak.',
                'calories' => 50,
                'cooking_time' => 90,
                'ingredients' => json_encode(['2 buah Apel', 'Air Jeruk Nipis', 'Bubuk Kayu Manis']),
                'steps' => json_encode(['Iris apel tipis-tipis.', 'Lumuri nipis dan kayu manis.', 'Oven suhu rendah (100C) selama 1 jam lebih hingga kering.'])
            ],
            [
                'title' => 'Jus Apel Wortel',
                'slug' => 'jus-apel-wortel',
                'main_ingredient' => 'Apel',
                'image_url' => 'https://placehold.co/600x400/ef4444/ffffff?text=Jus+Apel',
                'description' => 'Jus sehat untuk mata dan kulit.',
                'calories' => 90,
                'cooking_time' => 5,
                'ingredients' => json_encode(['1 buah Apel', '1 buah Wortel', 'Air', 'Madu']),
                'steps' => json_encode(['Cuci bersih apel dan wortel.', 'Blender dengan air dan madu.', 'Saring jika ingin tekstur halus.'])
            ],

            // --- 4. BELIMBING ---
            [
                'title' => 'Jus Belimbing Madu',
                'slug' => 'jus-belimbing',
                'main_ingredient' => 'Belimbing',
                'image_url' => 'https://placehold.co/600x400/f59e0b/ffffff?text=Jus+Belimbing',
                'description' => 'Jus penurun darah tinggi yang segar.',
                'calories' => 60,
                'cooking_time' => 5,
                'ingredients' => json_encode(['2 buah Belimbing', '2 sdm Madu', 'Es Batu']),
                'steps' => json_encode(['Potong belimbing.', 'Blender dengan madu dan es.', 'Saring ampasnya.'])
            ],
            [
                'title' => 'Rujak Belimbing Wuluh',
                'slug' => 'rujak-belimbing',
                'main_ingredient' => 'Belimbing',
                'image_url' => 'https://placehold.co/600x400/f59e0b/ffffff?text=Rujak+Belimbing',
                'description' => 'Rujak dengan cita rasa asam segar yang bikin melek.',
                'calories' => 100,
                'cooking_time' => 15,
                'ingredients' => json_encode(['5 Belimbing (bintang)', 'Gula Merah', 'Cabe Rawit', 'Kacang Tanah']),
                'steps' => json_encode(['Ulek bumbu rujak.', 'Potong belimbing.', 'Cocol atau campur belimbing dengan bumbu.'])
            ],
            [
                'title' => 'Manisan Belimbing',
                'slug' => 'manisan-belimbing',
                'main_ingredient' => 'Belimbing',
                'image_url' => 'https://placehold.co/600x400/f59e0b/ffffff?text=Manisan+Belimbing',
                'description' => 'Camilan belimbing awetan gula alami.',
                'calories' => 150,
                'cooking_time' => 60,
                'ingredients' => json_encode(['1kg Belimbing', '500gr Gula Pasir', 'Air Kapur Sirih', 'Air']),
                'steps' => json_encode(['Rendam belimbing di air kapur.', 'Rebus air gula hingga kental.', 'Masak belimbing dalam air gula hingga meresap.'])
            ],

            // --- 5. BUAH NAGA ---
            [
                'title' => 'Pudding Buah Naga',
                'slug' => 'pudding-naga',
                'main_ingredient' => 'Buah Naga',
                'image_url' => 'https://placehold.co/600x400/db2777/ffffff?text=Pudding+Naga',
                'description' => 'Pudding lembut berwarna ungu alami.',
                'calories' => 120,
                'cooking_time' => 30,
                'ingredients' => json_encode(['1 Buah Naga (blender)', '1 bks Agar-agar', '700ml Susu', 'Gula']),
                'steps' => json_encode(['Masak agar-agar, susu, gula.', 'Masukkan jus buah naga.', 'Cetak dan dinginkan.'])
            ],
            [
                'title' => 'Smoothie Bowl Naga',
                'slug' => 'smoothie-bowl-naga',
                'main_ingredient' => 'Buah Naga',
                'image_url' => 'https://placehold.co/600x400/db2777/ffffff?text=Smoothie+Bowl',
                'description' => 'Sarapan sehat kekinian.',
                'calories' => 200,
                'cooking_time' => 10,
                'ingredients' => json_encode(['Buah Naga beku', 'Pisang beku', 'Granola', 'Chia seeds']),
                'steps' => json_encode(['Blender buah naga dan pisang kental.', 'Tuang ke mangkok.', 'Hias dengan granola.'])
            ],
            [
                'title' => 'Es Krim Buah Naga',
                'slug' => 'es-krim-naga',
                'main_ingredient' => 'Buah Naga',
                'image_url' => 'https://placehold.co/600x400/db2777/ffffff?text=Es+Krim+Naga',
                'description' => 'Es krim homemade creamy.',
                'calories' => 250,
                'cooking_time' => 240,
                'ingredients' => json_encode(['Buah Naga halus', 'Whipped Cream cair', 'Susu Kental Manis']),
                'steps' => json_encode(['Kocok whipped cream.', 'Campur dengan jus naga dan SKM.', 'Bekukan di freezer.'])
            ],

            // --- 6. CHERRY ---
            [
                'title' => 'Black Forest Jar',
                'slug' => 'black-forest-jar',
                'main_ingredient' => 'Cherry',
                'image_url' => 'https://placehold.co/600x400/9f1239/ffffff?text=Black+Forest',
                'description' => 'Kue coklat klasik dalam toples dengan selai cherry.',
                'calories' => 300,
                'cooking_time' => 45,
                'ingredients' => json_encode(['Brownies potong', 'Selai Cherry/Buah Cherry', 'Krim Kocok', 'Coklat Serut']),
                'steps' => json_encode(['Susun brownies di jar.', 'Beri krim dan cherry.', 'Ulangi lapisan, tutup dengan coklat serut.'])
            ],
            [
                'title' => 'Selai Cherry Homemade',
                'slug' => 'selai-cherry',
                'main_ingredient' => 'Cherry',
                'image_url' => 'https://placehold.co/600x400/9f1239/ffffff?text=Selai+Cherry',
                'description' => 'Selai manis asam untuk olesan roti.',
                'calories' => 80,
                'cooking_time' => 30,
                'ingredients' => json_encode(['300gr Cherry segar', '100gr Gula Pasir', 'Air Lemon']),
                'steps' => json_encode(['Masak cherry dan gula di panci.', 'Aduk hingga kental dan hancur.', 'Beri perasan lemon.'])
            ],
            [
                'title' => 'Es Soda Cherry',
                'slug' => 'es-soda-cherry',
                'main_ingredient' => 'Cherry',
                'image_url' => 'https://placehold.co/600x400/9f1239/ffffff?text=Soda+Cherry',
                'description' => 'Minuman bersoda segar.',
                'calories' => 110,
                'cooking_time' => 5,
                'ingredients' => json_encode(['Sirup Cherry', 'Soda tawar', 'Es Batu', 'Buah Cherry utuh']),
                'steps' => json_encode(['Tuang sirup dan es.', 'Tambahkan soda.', 'Hias dengan buah cherry.'])
            ],

            // --- 7. DURIAN ---
            [
                'title' => 'Pancake Durian',
                'slug' => 'pancake-durian',
                'main_ingredient' => 'Durian',
                'image_url' => 'https://placehold.co/600x400/fde047/000000?text=Pancake+Durian',
                'description' => 'Kulit dadar tipis isi daging durian.',
                'calories' => 350,
                'cooking_time' => 40,
                'ingredients' => json_encode(['Daging Durian', 'Tepung Terigu', 'Telur', 'Krim Kocok', 'Pewarna makanan']),
                'steps' => json_encode(['Buat kulit dadar tipis.', 'Isi dengan krim dan durian.', 'Lipat amplop, dinginkan.'])
            ],
            [
                'title' => 'Ketan Duren Lumer',
                'slug' => 'ketan-duren',
                'main_ingredient' => 'Durian',
                'image_url' => 'https://placehold.co/600x400/fde047/000000?text=Ketan+Duren',
                'description' => 'Ketan gurih siram saus durian kental.',
                'calories' => 400,
                'cooking_time' => 30,
                'ingredients' => json_encode(['Beras Ketan', 'Santan', 'Daging Durian', 'Gula Merah']),
                'steps' => json_encode(['Kukus ketan dengan santan.', 'Masak saus: santan, durian, gula.', 'Siram saus ke atas ketan.'])
            ],
            [
                'title' => 'Es Teler Durian',
                'slug' => 'es-teler-durian',
                'main_ingredient' => 'Durian',
                'image_url' => 'https://placehold.co/600x400/fde047/000000?text=Es+Teler',
                'description' => 'Es campur spesial topping durian.',
                'calories' => 320,
                'cooking_time' => 15,
                'ingredients' => json_encode(['Alpukat', 'Kelapa Muda', 'Nangka', 'Daging Durian', 'Susu Kental Manis']),
                'steps' => json_encode(['Tata semua buah di mangkok.', 'Beri es serut.', 'Topping durian dan susu.'])
            ],

            // --- 8. JAMBU BIJI ---
            [
                'title' => 'Jus Jambu Merah',
                'slug' => 'jus-jambu',
                'main_ingredient' => 'Jambu Biji',
                'image_url' => 'https://placehold.co/600x400/fb7185/ffffff?text=Jus+Jambu',
                'description' => 'Jus kental kaya vitamin C.',
                'calories' => 100,
                'cooking_time' => 10,
                'ingredients' => json_encode(['2 Jambu Biji Merah', 'Air', 'Gula/Madu', 'Es Batu']),
                'steps' => json_encode(['Blender jambu dan air.', 'Saring bijinya.', 'Blender lagi dengan es dan gula.'])
            ],
            [
                'title' => 'Pudding Jambu',
                'slug' => 'pudding-jambu',
                'main_ingredient' => 'Jambu Biji',
                'image_url' => 'https://placehold.co/600x400/fb7185/ffffff?text=Pudding+Jambu',
                'description' => 'Pudding buah segar tekstur lembut.',
                'calories' => 130,
                'cooking_time' => 25,
                'ingredients' => json_encode(['Jus Jambu (saring)', 'Agar-agar', 'Susu Cair', 'Gula']),
                'steps' => json_encode(['Campur jus, agar, gula.', 'Masak hingga mendidih.', 'Cetak.'])
            ],
            [
                'title' => 'Asinan Jambu Kristal',
                'slug' => 'asinan-jambu',
                'main_ingredient' => 'Jambu Biji',
                'image_url' => 'https://placehold.co/600x400/fb7185/ffffff?text=Asinan+Jambu',
                'description' => 'Jambu kristal renyah dengan bumbu rujak.',
                'calories' => 80,
                'cooking_time' => 15,
                'ingredients' => json_encode(['Jambu Kristal', 'Cabe Rawit', 'Garam', 'Gula']),
                'steps' => json_encode(['Potong jambu.', 'Taburi bumbu ulek (cabe garam gula).', 'Kocok hingga rata.'])
            ],

            // --- 9. JERUK ---
            [
                'title' => 'Orange Squash',
                'slug' => 'orange-squash',
                'main_ingredient' => 'Jeruk',
                'image_url' => 'https://placehold.co/600x400/f97316/ffffff?text=Orange+Squash',
                'description' => 'Minuman soda jeruk segar.',
                'calories' => 120,
                'cooking_time' => 5,
                'ingredients' => json_encode(['Perasan Jeruk Manis', 'Soda tawar', 'Sirup Jeruk', 'Es Batu']),
                'steps' => json_encode(['Tuang sirup dan perasan jeruk.', 'Beri es batu.', 'Tuang soda sampai penuh.'])
            ],
            [
                'title' => 'Ayam Saus Jeruk',
                'slug' => 'ayam-saus-jeruk',
                'main_ingredient' => 'Jeruk',
                'image_url' => 'https://placehold.co/600x400/f97316/ffffff?text=Ayam+Saus+Jeruk',
                'description' => 'Ayam goreng tepung saus jeruk manis gurih.',
                'calories' => 450,
                'cooking_time' => 40,
                'ingredients' => json_encode(['Dada Ayam Fillet', 'Tepung Bumbu', 'Saus: Air Jeruk, Gula, Maizena']),
                'steps' => json_encode(['Goreng ayam tepung.', 'Masak saus jeruk hingga kental.', 'Siram ke ayam.'])
            ],
            [
                'title' => 'Pudding Jeruk Kelapa',
                'slug' => 'pudding-jeruk',
                'main_ingredient' => 'Jeruk',
                'image_url' => 'https://placehold.co/600x400/f97316/ffffff?text=Pudding+Jeruk',
                'description' => 'Pudding lapis jeruk dan kelapa muda.',
                'calories' => 140,
                'cooking_time' => 35,
                'ingredients' => json_encode(['Nutrijell Jeruk', 'Air Perasan Jeruk', 'Daging Kelapa Muda', 'Agar Plain']),
                'steps' => json_encode(['Masak lapisan jeruk, tuang cetakan.', 'Masak lapisan kelapa.', 'Tuang diatas lapisan jeruk yg sudah set.'])
            ],

            // --- 10. KELENGKENG ---
            [
                'title' => 'Es Buah Kelengkeng',
                'slug' => 'es-buah-kelengkeng',
                'main_ingredient' => 'Kelengkeng',
                'image_url' => 'https://placehold.co/600x400/d1d5db/000000?text=Es+Kelengkeng',
                'description' => 'Sup buah segar dominan kelengkeng.',
                'calories' => 180,
                'cooking_time' => 15,
                'ingredients' => json_encode(['Kelengkeng kupas', 'Nata de coco', 'Susu', 'Es Batu']),
                'steps' => json_encode(['Campur semua bahan di mangkok.', 'Sajikan dingin.'])
            ],
            [
                'title' => 'Pudding Kelengkeng',
                'slug' => 'pudding-kelengkeng',
                'main_ingredient' => 'Kelengkeng',
                'image_url' => 'https://placehold.co/600x400/d1d5db/000000?text=Pudding+Kelengkeng',
                'description' => 'Dessert manis dengan buah kelengkeng.',
                'calories' => 120,
                'cooking_time' => 25,
                'ingredients' => json_encode(['Kelengkeng', 'Agar-agar putih', 'Susu', 'Gula']),
                'steps' => json_encode(['Tata kelengkeng di dasar cetakan.', 'Masak agar susu.', 'Tuang perlahan.'])
            ],
            [
                'title' => 'Sup Ayam Kelengkeng',
                'slug' => 'sup-ayam-kelengkeng',
                'main_ingredient' => 'Kelengkeng',
                'image_url' => 'https://placehold.co/600x400/d1d5db/000000?text=Sup+Ayam',
                'description' => 'Masakan herbal ayam dengan kelengkeng kering.',
                'calories' => 250,
                'cooking_time' => 60,
                'ingredients' => json_encode(['Ayam Kampung', 'Kelengkeng Kering (Longan)', 'Jahe', 'Garam']),
                'steps' => json_encode(['Rebus ayam.', 'Masukkan kelengkeng kering dan jahe.', 'Masak hingga ayam empuk.'])
            ],

            // --- 11. KIWI ---
            [
                'title' => 'Tart Buah Kiwi',
                'slug' => 'tart-kiwi',
                'main_ingredient' => 'Kiwi',
                'image_url' => 'https://placehold.co/600x400/84cc16/ffffff?text=Tart+Kiwi',
                'description' => 'Kue tart mini topping kiwi.',
                'calories' => 220,
                'cooking_time' => 50,
                'ingredients' => json_encode(['Kulit Pie', 'Custard/Vla', 'Kiwi iris']),
                'steps' => json_encode(['Isi kulit pie dengan vla.', 'Hias dengan irisan kiwi.'])
            ],
            [
                'title' => 'Jus Kiwi Diet',
                'slug' => 'jus-kiwi',
                'main_ingredient' => 'Kiwi',
                'image_url' => 'https://placehold.co/600x400/84cc16/ffffff?text=Jus+Kiwi',
                'description' => 'Minuman detox dari kiwi dan nanas.',
                'calories' => 90,
                'cooking_time' => 5,
                'ingredients' => json_encode(['2 buah Kiwi', 'Madu', 'Air']),
                'steps' => json_encode(['Blender kiwi dan air.', 'Tambahkan madu.', 'Sajikan segera.'])
            ],
            [
                'title' => 'Salad Kiwi Udang',
                'slug' => 'salad-kiwi',
                'main_ingredient' => 'Kiwi',
                'image_url' => 'https://placehold.co/600x400/84cc16/ffffff?text=Salad+Kiwi',
                'description' => 'Salad appetizer udang dan kiwi.',
                'calories' => 150,
                'cooking_time' => 20,
                'ingredients' => json_encode(['Udang rebus', 'Kiwi potong dadu', 'Selada', 'Mayonaise']),
                'steps' => json_encode(['Campur sayur dan udang.', 'Beri topping kiwi.', 'Siram dressing.'])
            ],

            // --- 12. KURMA ---
            [
                'title' => 'Susu Kurma Madu',
                'slug' => 'susu-kurma',
                'main_ingredient' => 'Kurma',
                'image_url' => 'https://placehold.co/600x400/78350f/ffffff?text=Susu+Kurma',
                'description' => 'Booster energi instan.',
                'calories' => 200,
                'cooking_time' => 5,
                'ingredients' => json_encode(['7 butir Kurma (rendam)', 'Susu UHT', 'Madu']),
                'steps' => json_encode(['Blender kurma dan susu.', 'Saring jika perlu.'])
            ],
            [
                'title' => 'Bolu Kurma Kukus',
                'slug' => 'bolu-kurma',
                'main_ingredient' => 'Kurma',
                'image_url' => 'https://placehold.co/600x400/78350f/ffffff?text=Bolu+Kurma',
                'description' => 'Kue bolu lembut potongan kurma.',
                'calories' => 250,
                'cooking_time' => 45,
                'ingredients' => json_encode(['Tepung terigu', 'Telur', 'Kurma cincang', 'Gula']),
                'steps' => json_encode(['Kocok telur gula.', 'Masukan tepung dan kurma.', 'Kukus sampai matang.'])
            ],
            [
                'title' => 'Coklat Kurma Almond',
                'slug' => 'coklat-kurma',
                'main_ingredient' => 'Kurma',
                'image_url' => 'https://placehold.co/600x400/78350f/ffffff?text=Coklat+Kurma',
                'description' => 'Camilan kurma isi almond balut coklat.',
                'calories' => 100,
                'cooking_time' => 30,
                'ingredients' => json_encode(['Kurma', 'Kacang Almond sangrai', 'Coklat Batang leleh']),
                'steps' => json_encode(['Isi kurma dengan almond.', 'Celup ke coklat leleh.', 'Dinginkan.'])
            ],

            // --- 13. LECI ---
            [
                'title' => 'Lychee Ice Tea',
                'slug' => 'lychee-tea',
                'main_ingredient' => 'Leci',
                'image_url' => 'https://placehold.co/600x400/fecaca/000000?text=Lychee+Tea',
                'description' => 'Teh manis dingin buah leci ala kafe.',
                'calories' => 110,
                'cooking_time' => 5,
                'ingredients' => json_encode(['Teh Celup', 'Leci kaleng/segar', 'Gula', 'Es Batu']),
                'steps' => json_encode(['Seduh teh manis.', 'Masukkan buah leci dan sedikit airnya.', 'Beri es batu.'])
            ],
            [
                'title' => 'Pudding Leci Sutra',
                'slug' => 'pudding-leci',
                'main_ingredient' => 'Leci',
                'image_url' => 'https://placehold.co/600x400/fecaca/000000?text=Pudding+Leci',
                'description' => 'Pudding lembut aroma leci.',
                'calories' => 120,
                'cooking_time' => 20,
                'ingredients' => json_encode(['Susu cair', 'Jelly powder plain', 'Sirup Leci']),
                'steps' => json_encode(['Masak susu, jelly, sirup.', 'Saring dan cetak.', 'Dinginkan.'])
            ],
            [
                'title' => 'Es Leci Yakult',
                'slug' => 'leci-yakult',
                'main_ingredient' => 'Leci',
                'image_url' => 'https://placehold.co/600x400/fecaca/000000?text=Leci+Yakult',
                'description' => 'Minuman kekinian leci dan yogurt.',
                'calories' => 90,
                'cooking_time' => 5,
                'ingredients' => json_encode(['2 botol Yakult', 'Sirup Leci', 'Buah Leci', 'Es']),
                'steps' => json_encode(['Campur yakult, sirup, air, es.', 'Aduk rata.'])
            ],

            // --- 14. LEMON ---
            [
                'title' => 'Lemon Tea Hangat',
                'slug' => 'lemon-tea',
                'main_ingredient' => 'Lemon',
                'image_url' => 'https://placehold.co/600x400/fef08a/000000?text=Lemon+Tea',
                'description' => 'Teh hangat irisan lemon untuk flu.',
                'calories' => 60,
                'cooking_time' => 5,
                'ingredients' => json_encode(['Teh Panas', 'Irisan Lemon', 'Madu']),
                'steps' => json_encode(['Seduh teh.', 'Peras sedikit lemon dan masukkan irisannya.', 'Beri madu.'])
            ],
            [
                'title' => 'Lemon Pound Cake',
                'slug' => 'lemon-cake',
                'main_ingredient' => 'Lemon',
                'image_url' => 'https://placehold.co/600x400/fef08a/000000?text=Lemon+Cake',
                'description' => 'Bolu padat aroma lemon.',
                'calories' => 300,
                'cooking_time' => 60,
                'ingredients' => json_encode(['Tepung', 'Mentega', 'Parutan Kulit Lemon', 'Telur']),
                'steps' => json_encode(['Kocok mentega gula.', 'Masukan telur dan tepung.', 'Beri parutan lemon, oven.'])
            ],
            [
                'title' => 'Ayam Goreng Lemon',
                'slug' => 'ayam-lemon',
                'main_ingredient' => 'Lemon',
                'image_url' => 'https://placehold.co/600x400/fef08a/000000?text=Ayam+Lemon',
                'description' => 'Ayam crispy saus lemon kental.',
                'calories' => 400,
                'cooking_time' => 40,
                'ingredients' => json_encode(['Ayam Fillet', 'Lemon', 'Gula', 'Maizena']),
                'steps' => json_encode(['Goreng ayam tepung.', 'Masak saus lemon gula maizena.', 'Siram ke ayam.'])
            ],

            // --- 15. MANGGA ---
            [
                'title' => 'Mango Sticky Rice',
                'slug' => 'mango-sticky-rice',
                'main_ingredient' => 'Mangga',
                'image_url' => 'https://placehold.co/600x400/fbbf24/000000?text=Sticky+Rice',
                'description' => 'Ketan santan gurih dengan mangga manis.',
                'calories' => 450,
                'cooking_time' => 30,
                'ingredients' => json_encode(['Mangga Harum Manis', 'Beras Ketan', 'Santan kental', 'Wijen']),
                'steps' => json_encode(['Kukus ketan santan.', 'Kupas mangga.', 'Sajikan berdampingan, taburi wijen.'])
            ],
            [
                'title' => 'Sambal Mangga Muda',
                'slug' => 'sambal-mangga',
                'main_ingredient' => 'Mangga',
                'image_url' => 'https://placehold.co/600x400/fbbf24/000000?text=Sambal+Mangga',
                'description' => 'Sambal pedas asam segar.',
                'calories' => 90,
                'cooking_time' => 15,
                'ingredients' => json_encode(['Mangga Muda serut', 'Cabe Rawit', 'Terasi', 'Gula Merah']),
                'steps' => json_encode(['Ulek cabe terasi gula.', 'Campur dengan mangga serut.'])
            ],
            [
                'title' => 'Mango Sago',
                'slug' => 'mango-sago',
                'main_ingredient' => 'Mangga',
                'image_url' => 'https://placehold.co/600x400/fbbf24/000000?text=Mango+Sago',
                'description' => 'Dessert sagu mutiara kuah mangga.',
                'calories' => 300,
                'cooking_time' => 30,
                'ingredients' => json_encode(['Jus Mangga', 'Sagu Mutiara', 'Susu Evaporasi', 'Potongan Mangga']),
                'steps' => json_encode(['Rebus sagu.', 'Campur jus, susu, sagu.', 'Dinginkan.'])
            ],

            // --- 16. MANGGIS ---
            [
                'title' => 'Teh Kulit Manggis',
                'slug' => 'teh-manggis',
                'main_ingredient' => 'Manggis',
                'image_url' => 'https://placehold.co/600x400/581c87/ffffff?text=Teh+Manggis',
                'description' => 'Minuman herbal dari kulit manggis.',
                'calories' => 10,
                'cooking_time' => 15,
                'ingredients' => json_encode(['Kulit Manggis kering', 'Air panas', 'Madu']),
                'steps' => json_encode(['Seduh/rebus kulit manggis.', 'Saring airnya.', 'Beri madu.'])
            ],
            [
                'title' => 'Jus Manggis Segar',
                'slug' => 'jus-manggis',
                'main_ingredient' => 'Manggis',
                'image_url' => 'https://placehold.co/600x400/581c87/ffffff?text=Jus+Manggis',
                'description' => 'Jus daging buah manggis putih bersih.',
                'calories' => 80,
                'cooking_time' => 10,
                'ingredients' => json_encode(['Daging Manggis', 'Air', 'Es Batu']),
                'steps' => json_encode(['Blender daging manggis (jangan sampai biji hancur).', 'Saring jika perlu.'])
            ],
            [
                'title' => 'Salad Buah Manggis',
                'slug' => 'salad-manggis',
                'main_ingredient' => 'Manggis',
                'image_url' => 'https://placehold.co/600x400/581c87/ffffff?text=Salad+Manggis',
                'description' => 'Campuran buah tropis.',
                'calories' => 120,
                'cooking_time' => 15,
                'ingredients' => json_encode(['Manggis', 'Anggur', 'Yogurt', 'Keju']),
                'steps' => json_encode(['Campur semua buah.', 'Siram yogurt.'])
            ],

            // --- 17. MARKISA ---
            [
                'title' => 'Es Sirup Markisa',
                'slug' => 'sirup-markisa',
                'main_ingredient' => 'Markisa',
                'image_url' => 'https://placehold.co/600x400/facc15/000000?text=Sirup+Markisa',
                'description' => 'Minuman khas Medan bulir markisa.',
                'calories' => 100,
                'cooking_time' => 5,
                'ingredients' => json_encode(['Sirup Markisa', 'Isi Markisa asli', 'Air', 'Es']),
                'steps' => json_encode(['Larutkan sirup.', 'Beri isian markisa asli.'])
            ],
            [
                'title' => 'Pudding Markisa',
                'slug' => 'pudding-markisa',
                'main_ingredient' => 'Markisa',
                'image_url' => 'https://placehold.co/600x400/facc15/000000?text=Pudding+Markisa',
                'description' => 'Pudding asam manis.',
                'calories' => 120,
                'cooking_time' => 25,
                'ingredients' => json_encode(['Agar-agar', 'Sari Markisa', 'Gula']),
                'steps' => json_encode(['Masak agar dengan sari markisa.', 'Cetak.'])
            ],
            [
                'title' => 'Mojito Markisa',
                'slug' => 'mojito-markisa',
                'main_ingredient' => 'Markisa',
                'image_url' => 'https://placehold.co/600x400/facc15/000000?text=Mojito+Markisa',
                'description' => 'Soda daun mint rasa markisa.',
                'calories' => 110,
                'cooking_time' => 5,
                'ingredients' => json_encode(['Markisa', 'Daun Mint', 'Soda Lime', 'Lemon']),
                'steps' => json_encode(['Tumbuk mint dan lemon.', 'Masukkan markisa dan es.', 'Tuang soda.'])
            ],

            // --- 18. MELON ---
            [
                'title' => 'Es Melon Serut',
                'slug' => 'es-melon',
                'main_ingredient' => 'Melon',
                'image_url' => 'https://placehold.co/600x400/4ade80/000000?text=Es+Melon',
                'description' => 'Es daging melon serut dan selasih.',
                'calories' => 130,
                'cooking_time' => 10,
                'ingredients' => json_encode(['Melon serut', 'Sirup Melon', 'Selasih', 'Es']),
                'steps' => json_encode(['Campur melon, selasih, sirup, es.', 'Aduk rata.'])
            ],
            [
                'title' => 'Susu Melon Korea',
                'slug' => 'susu-melon',
                'main_ingredient' => 'Melon',
                'image_url' => 'https://placehold.co/600x400/4ade80/000000?text=Susu+Melon',
                'description' => 'Susu creamy rasa melon.',
                'calories' => 150,
                'cooking_time' => 5,
                'ingredients' => json_encode(['Melon blender halus', 'Susu UHT', 'Gula']),
                'steps' => json_encode(['Campur jus melon dan susu.', 'Sajikan dingin.'])
            ],
            [
                'title' => 'Salad Melon Bola',
                'slug' => 'salad-melon',
                'main_ingredient' => 'Melon',
                'image_url' => 'https://placehold.co/600x400/4ade80/000000?text=Salad+Melon',
                'description' => 'Salad buah bentuk bola cantik.',
                'calories' => 100,
                'cooking_time' => 15,
                'ingredients' => json_encode(['Melon Hijau', 'Melon Oranye', 'Mayonaise']),
                'steps' => json_encode(['Kerok melon bentuk bulat.', 'Sajikan dengan dressing.'])
            ],

            // --- 19. NANAS ---
            [
                'title' => 'Selai Nanas Nastar',
                'slug' => 'selai-nanas',
                'main_ingredient' => 'Nanas',
                'image_url' => 'https://placehold.co/600x400/fcd34d/000000?text=Selai+Nanas',
                'description' => 'Selai isian nastar legit.',
                'calories' => 300,
                'cooking_time' => 60,
                'ingredients' => json_encode(['Nanas parut', 'Gula Pasir', 'Kayu Manis', 'Cengkeh']),
                'steps' => json_encode(['Masak nanas sampai air susut.', 'Masukkan gula.', 'Masak sampai kering lengket.'])
            ],
            [
                'title' => 'Ayam Kuluyuk Nanas',
                'slug' => 'ayam-kuluyuk',
                'main_ingredient' => 'Nanas',
                'image_url' => 'https://placehold.co/600x400/fcd34d/000000?text=Ayam+Kuluyuk',
                'description' => 'Ayam asam manis potongan nanas.',
                'calories' => 400,
                'cooking_time' => 45,
                'ingredients' => json_encode(['Ayam Tepung', 'Nanas potong', 'Saus Asam Manis', 'Bawang Bombay']),
                'steps' => json_encode(['Tumis bawang dan saus.', 'Masukkan nanas dan ayam.', 'Aduk rata.'])
            ],
            [
                'title' => 'Es Nanas Serut Coklat',
                'slug' => 'es-nanas-coklat',
                'main_ingredient' => 'Nanas',
                'image_url' => 'https://placehold.co/600x400/fcd34d/000000?text=Es+Nanas',
                'description' => 'Jajanan SD nanas beku celup coklat.',
                'calories' => 150,
                'cooking_time' => 120,
                'ingredients' => json_encode(['Nanas potong', 'Coklat Leleh', 'Tusuk Sate']),
                'steps' => json_encode(['Tusuk nanas.', 'Bekukan.', 'Celup coklat leleh.'])
            ],

            // --- 20. NANGKA ---
            [
                'title' => 'Kolak Pisang Nangka',
                'slug' => 'kolak-nangka',
                'main_ingredient' => 'Nangka',
                'image_url' => 'https://placehold.co/600x400/fbbf24/000000?text=Kolak+Nangka',
                'description' => 'Kolak wangi aroma nangka.',
                'calories' => 300,
                'cooking_time' => 40,
                'ingredients' => json_encode(['Nangka', 'Pisang', 'Santan', 'Gula Merah']),
                'steps' => json_encode(['Rebus santan gula merah.', 'Masukan pisang.', 'Terakhir masukan nangka.'])
            ],
            [
                'title' => 'Gudeg Nangka Muda',
                'slug' => 'gudeg-nangka',
                'main_ingredient' => 'Nangka',
                'image_url' => 'https://placehold.co/600x400/78350f/ffffff?text=Gudeg',
                'description' => 'Sayur nangka muda khas Jogja.',
                'calories' => 350,
                'cooking_time' => 180,
                'ingredients' => json_encode(['Nangka Muda', 'Santan', 'Gula Merah', 'Bumbu Halus']),
                'steps' => json_encode(['Masak nangka dengan bumbu dan santan.', 'Masak api kecil sampai kering meresap.'])
            ],
            [
                'title' => 'Es Cendol Nangka',
                'slug' => 'es-cendol-nangka',
                'main_ingredient' => 'Nangka',
                'image_url' => 'https://placehold.co/600x400/fbbf24/000000?text=Es+Cendol',
                'description' => 'Cendol santan topping nangka.',
                'calories' => 250,
                'cooking_time' => 15,
                'ingredients' => json_encode(['Cendol', 'Santan', 'Gula Merah cair', 'Potongan Nangka']),
                'steps' => json_encode(['Susun cendol, es, nangka.', 'Siram santan dan gula.'])
            ],

            // --- 21. PEAR ---
            [
                'title' => 'Pear Rebus Madu',
                'slug' => 'pear-rebus',
                'main_ingredient' => 'Pear',
                'image_url' => 'https://placehold.co/600x400/e5e7eb/000000?text=Pear+Rebus',
                'description' => 'Obat batuk alami pear kukus.',
                'calories' => 80,
                'cooking_time' => 30,
                'ingredients' => json_encode(['Buah Pear', 'Madu', 'Jahe']),
                'steps' => json_encode(['Potong atas pear, kerok sedikit.', 'Isi madu dan jahe.', 'Kukus sampai empuk.'])
            ],
            [
                'title' => 'Salad Pear Walnuts',
                'slug' => 'salad-pear',
                'main_ingredient' => 'Pear',
                'image_url' => 'https://placehold.co/600x400/e5e7eb/000000?text=Salad+Pear',
                'description' => 'Salad sehat irisan pear renyah.',
                'calories' => 150,
                'cooking_time' => 10,
                'ingredients' => json_encode(['Pear iris tipis', 'Selada', 'Kacang Walnut', 'Dressing Lemon']),
                'steps' => json_encode(['Campur sayuran dan pear.', 'Tabur kacang.', 'Siram dressing.'])
            ],
            [
                'title' => 'Pie Buah Pear',
                'slug' => 'pie-pear',
                'main_ingredient' => 'Pear',
                'image_url' => 'https://placehold.co/600x400/e5e7eb/000000?text=Pie+Pear',
                'description' => 'Pie manis isian pear lembut.',
                'calories' => 280,
                'cooking_time' => 50,
                'ingredients' => json_encode(['Kulit Pie', 'Pear potong', 'Gula', 'Kayu Manis']),
                'steps' => json_encode(['Tata pear di kulit pie.', 'Taburi gula kayu manis.', 'Panggang.'])
            ],

            // --- 22. PISANG ---
            [
                'title' => 'Pisang Goreng Pasir',
                'slug' => 'pisang-goreng-pasir',
                'main_ingredient' => 'Pisang',
                'image_url' => 'https://placehold.co/600x400/facc15/000000?text=Pisang+Goreng',
                'description' => 'Pisang balut tepung panir renyah.',
                'calories' => 250,
                'cooking_time' => 20,
                'ingredients' => json_encode(['Pisang Kepok', 'Tepung Terigu', 'Tepung Panir', 'Minyak']),
                'steps' => json_encode(['Celup pisang ke adonan tepung basah.', 'Gulingkan di panir.', 'Goreng.'])
            ],
            [
                'title' => 'Banana Bread',
                'slug' => 'banana-bread',
                'main_ingredient' => 'Pisang',
                'image_url' => 'https://placehold.co/600x400/facc15/000000?text=Banana+Bread',
                'description' => 'Roti bolu pisang padat.',
                'calories' => 280,
                'cooking_time' => 60,
                'ingredients' => json_encode(['Pisang lumat', 'Tepung', 'Telur', 'Butter']),
                'steps' => json_encode(['Campur bahan basah.', 'Masukan bahan kering.', 'Oven sampai matang.'])
            ],
            [
                'title' => 'Kolak Pisang Ubi',
                'slug' => 'kolak-pisang',
                'main_ingredient' => 'Pisang',
                'image_url' => 'https://placehold.co/600x400/facc15/000000?text=Kolak+Pisang',
                'description' => 'Takjil klasik pisang dan ubi.',
                'calories' => 300,
                'cooking_time' => 40,
                'ingredients' => json_encode(['Pisang', 'Ubi', 'Santan', 'Gula Merah']),
                'steps' => json_encode(['Rebus ubi, gula, santan.', 'Masukan pisang.', 'Masak hingga matang.'])
            ],

            // --- 23. SALAK ---
            [
                'title' => 'Manisan Salak',
                'slug' => 'manisan-salak',
                'main_ingredient' => 'Salak',
                'image_url' => 'https://placehold.co/600x400/713f12/ffffff?text=Manisan+Salak',
                'description' => 'Salak awetan gula pedas.',
                'calories' => 150,
                'cooking_time' => 60,
                'ingredients' => json_encode(['Salak', 'Gula', 'Cabe', 'Air']),
                'steps' => json_encode(['Rebus air gula cabe.', 'Rendam salak semalaman.'])
            ],
            [
                'title' => 'Keripik Salak',
                'slug' => 'keripik-salak',
                'main_ingredient' => 'Salak',
                'image_url' => 'https://placehold.co/600x400/713f12/ffffff?text=Keripik+Salak',
                'description' => 'Oleh-oleh khas salak goreng vakum.',
                'calories' => 120,
                'cooking_time' => 90,
                'ingredients' => json_encode(['Salak Pondoh', 'Minyak']),
                'steps' => json_encode(['Goreng salak dengan mesin vacuum frying.'])
            ],
            [
                'title' => 'Asinan Salak',
                'slug' => 'asinan-salak',
                'main_ingredient' => 'Salak',
                'image_url' => 'https://placehold.co/600x400/713f12/ffffff?text=Asinan+Salak',
                'description' => 'Potongan salak kuah cuka.',
                'calories' => 100,
                'cooking_time' => 20,
                'ingredients' => json_encode(['Salak', 'Cuka', 'Gula', 'Cabe']),
                'steps' => json_encode(['Buat kuah asinan.', 'Masukkan potongan salak.', 'Dinginkan.'])
            ],

            // --- 24. SAWO ---
            [
                'title' => 'Jus Sawo Coklat',
                'slug' => 'jus-sawo',
                'main_ingredient' => 'Sawo',
                'image_url' => 'https://placehold.co/600x400/a0522d/ffffff?text=Jus+Sawo',
                'description' => 'Jus kental manis buah sawo.',
                'calories' => 120,
                'cooking_time' => 5,
                'ingredients' => json_encode(['Sawo matang', 'Susu Coklat', 'Es']),
                'steps' => json_encode(['Blender sawo dan susu coklat.', 'Sajikan dingin.'])
            ],
            [
                'title' => 'Pudding Sawo',
                'slug' => 'pudding-sawo',
                'main_ingredient' => 'Sawo',
                'image_url' => 'https://placehold.co/600x400/a0522d/ffffff?text=Pudding+Sawo',
                'description' => 'Kreasi unik pudding sawo.',
                'calories' => 130,
                'cooking_time' => 25,
                'ingredients' => json_encode(['Sawo halus', 'Agar-agar', 'Gula']),
                'steps' => json_encode(['Masak agar dengan jus sawo.', 'Cetak.'])
            ],
            [
                'title' => 'Pie Sawo',
                'slug' => 'pie-sawo',
                'main_ingredient' => 'Sawo',
                'image_url' => 'https://placehold.co/600x400/a0522d/ffffff?text=Pie+Sawo',
                'description' => 'Pie dengan filling sawo manis.',
                'calories' => 280,
                'cooking_time' => 50,
                'ingredients' => json_encode(['Kulit Pie', 'Daging Sawo', 'Kayu Manis']),
                'steps' => json_encode(['Isi kulit pie dengan sawo.', 'Panggang.'])
            ],

            // --- 25. SRIKAYA ---
            [
                'title' => 'Selai Srikaya Pandan',
                'slug' => 'selai-srikaya',
                'main_ingredient' => 'Srikaya',
                'image_url' => 'https://placehold.co/600x400/84cc16/000000?text=Selai+Srikaya',
                'description' => 'Selai teman roti bakar.',
                'calories' => 200,
                'cooking_time' => 45,
                'ingredients' => json_encode(['Srikaya', 'Santan', 'Telur', 'Gula', 'Pandan']),
                'steps' => json_encode(['Masak semua bahan dengan api kecil sambil diaduk terus sampai kental.'])
            ],
            [
                'title' => 'Es Krim Srikaya',
                'slug' => 'es-krim-srikaya',
                'main_ingredient' => 'Srikaya',
                'image_url' => 'https://placehold.co/600x400/84cc16/000000?text=Es+Krim+Srikaya',
                'description' => 'Es krim tradisional lembut.',
                'calories' => 180,
                'cooking_time' => 240,
                'ingredients' => json_encode(['Srikaya', 'Santan', 'Maizena']),
                'steps' => json_encode(['Masak adonan srikaya santan.', 'Bekukan.', 'Mixer, bekukan lagi.'])
            ],
            [
                'title' => 'Pudding Srikaya Roti',
                'slug' => 'pudding-srikaya-roti',
                'main_ingredient' => 'Srikaya',
                'image_url' => 'https://placehold.co/600x400/84cc16/000000?text=Pudding+Roti',
                'description' => 'Pudding roti tawar santan srikaya.',
                'calories' => 250,
                'cooking_time' => 40,
                'ingredients' => json_encode(['Roti Tawar', 'Srikaya', 'Santan', 'Telur']),
                'steps' => json_encode(['Tata roti.', 'Siram campuran santan telur srikaya.', 'Kukus.'])
            ],

            // --- 26. STRAWBERRY ---
            [
                'title' => 'Strawberry Shortcake',
                'slug' => 'strawberry-shortcake',
                'main_ingredient' => 'Strawberry',
                'image_url' => 'https://placehold.co/600x400/f43f5e/ffffff?text=Shortcake',
                'description' => 'Kue bolu lapis krim strawberry.',
                'calories' => 350,
                'cooking_time' => 60,
                'ingredients' => json_encode(['Sponge Cake', 'Whipped Cream', 'Strawberry segar']),
                'steps' => json_encode(['Potong cake.', 'Oles krim dan strawberry.', 'Tumpuk.'])
            ],
            [
                'title' => 'Jus Strawberry Yogurt',
                'slug' => 'jus-strawberry',
                'main_ingredient' => 'Strawberry',
                'image_url' => 'https://placehold.co/600x400/f43f5e/ffffff?text=Jus+Strawberry',
                'description' => 'Minuman pink sehat asam segar.',
                'calories' => 110,
                'cooking_time' => 5,
                'ingredients' => json_encode(['Strawberry', 'Yogurt', 'Madu', 'Es']),
                'steps' => json_encode(['Blender semua bahan.', 'Sajikan.'])
            ],
            [
                'title' => 'Tanghulu Strawberry',
                'slug' => 'tanghulu-strawberry',
                'main_ingredient' => 'Strawberry',
                'image_url' => 'https://placehold.co/600x400/f43f5e/ffffff?text=Tanghulu',
                'description' => 'Strawberry lapis permen gula renyah.',
                'calories' => 150,
                'cooking_time' => 20,
                'ingredients' => json_encode(['Strawberry utuh', 'Gula Pasir', 'Air']),
                'steps' => json_encode(['Masak gula sampai jadi karamel.', 'Celup strawberry sebentar.', 'Dinginkan sampai keras.'])
            ],
        ];

        foreach ($recipes as $recipe) {
            DB::table('recipes')->updateOrInsert(
                ['slug' => $recipe['slug']],
                array_merge($recipe, ['created_at' => now(), 'updated_at' => now()])
            );
        }
    }
}