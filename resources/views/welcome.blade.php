@extends('layouts.app')

@section('content')
<section class="relative bg-emerald-50 overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 lg:py-28 flex flex-col-reverse lg:flex-row items-center">
        
        <div class="w-full lg:w-1/2 text-center lg:text-left z-10">
            <span class="bg-emerald-100 text-emerald-700 px-4 py-1 rounded-full text-sm font-semibold tracking-wide mb-4 inline-block">
                🚀 Teknologi AI Terbaru
            </span>
            <h1 class="text-4xl lg:text-6xl font-bold text-slate-800 leading-tight mb-6">
                Bingung Mau <br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-500 to-teal-400">Masak Apa?</span>
            </h1>
            <p class="text-lg text-slate-500 mb-8 max-w-lg mx-auto lg:mx-0">
                Cukup foto isi kulkasmu. Biarkan AI kami mendeteksi bahannya dan merekomendasikan resep sehat untukmu.
            </p>
            
            <div class="flex gap-4 justify-center lg:justify-start">
                <a href="{{ route('scan.index') }}" class="bg-emerald-500 hover:bg-emerald-600 text-white px-8 py-4 rounded-xl font-bold shadow-lg hover:shadow-emerald-200/50 transition-all flex items-center gap-2">
                    <i class="fa-solid fa-camera"></i> Coba Scan Sekarang
                </a>
                
                <button onclick="openDemoModal()" class="bg-white hover:bg-slate-50 text-slate-700 border border-slate-200 px-8 py-4 rounded-xl font-bold transition-all flex items-center gap-2 shadow-sm hover:shadow-md">
                    <i class="fa-regular fa-circle-play text-emerald-500 text-xl"></i> Lihat Demo
                </button>
            </div>
        </div>

        <div class="w-full lg:w-1/2 mb-10 lg:mb-0 relative">
            <div class="absolute top-0 right-0 w-72 h-72 bg-emerald-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob"></div>
            <div class="absolute -bottom-8 left-0 w-72 h-72 bg-orange-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-2000"></div>
            
            <img src="https://images.unsplash.com/photo-1610832958506-aa56368176cf?q=80&w=2670&auto=format&fit=crop" 
                 class="relative rounded-3xl shadow-2xl rotate-3 hover:rotate-0 transition-all duration-500 border-4 border-white mx-auto w-3/4 object-cover h-96" 
                 alt="Buah Segar">
        </div>
    </div>
</section>

<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold text-slate-800 mb-12">Cara Kerja <span class="text-emerald-500">Ajaib</span></h2>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="p-8 rounded-2xl bg-slate-50 hover:bg-emerald-50 transition-colors duration-300 border border-slate-100 group">
                <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center mx-auto mb-6 shadow-sm group-hover:scale-110 transition-transform">
                    <i class="fa-solid fa-camera text-2xl text-emerald-500"></i>
                </div>
                <h3 class="text-xl font-bold mb-3">1. Upload Foto</h3>
                <p class="text-slate-500">Ambil foto buah atau sayuran yang kamu miliki di dapur.</p>
            </div>

            <div class="p-8 rounded-2xl bg-slate-50 hover:bg-emerald-50 transition-colors duration-300 border border-slate-100 group">
                <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center mx-auto mb-6 shadow-sm group-hover:scale-110 transition-transform">
                    <i class="fa-solid fa-microchip text-2xl text-orange-400"></i>
                </div>
                <h3 class="text-xl font-bold mb-3">2. AI Berpikir</h3>
                <p class="text-slate-500">Sistem cerdas kami akan mengenali jenis bahan makananmu.</p>
            </div>

            <div class="p-8 rounded-2xl bg-slate-50 hover:bg-emerald-50 transition-colors duration-300 border border-slate-100 group">
                <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center mx-auto mb-6 shadow-sm group-hover:scale-110 transition-transform">
                    <i class="fa-solid fa-utensils text-2xl text-emerald-500"></i>
                </div>
                <h3 class="text-xl font-bold mb-3">3. Jadi Masakan</h3>
                <p class="text-slate-500">Dapatkan rekomendasi resep sesuai bahan yang tersedia.</p>
            </div>
        </div>
    </div>
</section>

<div id="demoModal" class="fixed inset-0 z-[9999] hidden items-center justify-center">
    
    <div class="absolute inset-0 bg-slate-900/80 backdrop-blur-sm transition-opacity" onclick="closeDemoModal()"></div>

    <div class="relative w-full max-w-4xl mx-4 bg-black rounded-2xl shadow-2xl overflow-hidden animate-fade-in-up transform transition-all">
        
        <button onclick="closeDemoModal()" class="absolute top-4 right-4 z-10 text-white hover:text-red-400 bg-black/50 hover:bg-black/70 rounded-full w-10 h-10 flex items-center justify-center transition-colors">
            <i class="fa-solid fa-xmark text-xl"></i>
        </button>

        <div class="relative pt-[56.25%]">
            <iframe 
                id="youtubeFrame"
                class="absolute top-0 left-0 w-full h-full"
                src="" 
                title="Demo Aplikasi" 
                frameborder="0" 
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                allowfullscreen>
            </iframe>
        </div>
    </div>
</div>

<script>
    function openDemoModal() {
        const modal = document.getElementById('demoModal');
        const frame = document.getElementById('youtubeFrame');
        
        // ID Video YouTube Anda: JGHxxlBCTzA
        // autoplay=1 : Video otomatis mulai
        // rel=0 : Tidak menampilkan video rekomendasi channel lain di akhir
        const videoUrl = "https://www.youtube.com/embed/JGHxxlBCTzA?autoplay=1&rel=0"; 

        // 1. Munculkan Modal
        modal.classList.remove('hidden');
        modal.classList.add('flex');

        // 2. Isi SRC iframe (Load video)
        frame.setAttribute('src', videoUrl);
    }

    function closeDemoModal() {
        const modal = document.getElementById('demoModal');
        const frame = document.getElementById('youtubeFrame');

        // 1. Sembunyikan Modal
        modal.classList.add('hidden');
        modal.classList.remove('flex');

        // 2. Kosongkan SRC (PENTING: Agar suara video berhenti total)
        frame.setAttribute('src', '');
    }

    // Menutup modal dengan tombol ESC keyboard
    document.addEventListener('keydown', function(event) {
        if (event.key === "Escape") {
            closeDemoModal();
        }
    });
</script>

<style>
    /* Animasi Blob Background */
    @keyframes blob {
        0% { transform: translate(0px, 0px) scale(1); }
        33% { transform: translate(30px, -50px) scale(1.1); }
        66% { transform: translate(-20px, 20px) scale(0.9); }
        100% { transform: translate(0px, 0px) scale(1); }
    }
    .animate-blob {
        animation: blob 7s infinite;
    }
    .animation-delay-2000 {
        animation-delay: 2s;
    }

    /* Animasi Modal Muncul */
    @keyframes fadeInUp {
        from { opacity: 0; transform: scale(0.95); }
        to { opacity: 1; transform: scale(1); }
    }
    .animate-fade-in-up {
        animation: fadeInUp 0.3s ease-out forwards;
    }
</style>
@endsection