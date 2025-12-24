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
                <button onclick="openDemoModal()" class="bg-white hover:bg-slate-50 text-slate-700 border border-slate-200 px-8 py-4 rounded-xl font-bold transition-all flex items-center gap-2">
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
<div id="demoModal" class="fixed inset-0 z-[100] hidden bg-black/90 backdrop-blur-sm flex items-center justify-center p-4 opacity-0 transition-opacity duration-300">
    
    <div class="relative w-full max-w-5xl bg-black rounded-3xl overflow-hidden shadow-2xl transform scale-95 transition-transform duration-300" id="modalContent">
        
        <button onclick="closeDemoModal()" class="absolute top-4 right-4 z-10 w-10 h-10 bg-black/50 hover:bg-red-600 text-white rounded-full flex items-center justify-center transition-colors">
            <i class="fa-solid fa-xmark text-lg"></i>
        </button>

        <div class="relative pt-[56.25%]">
            <iframe id="demoVideo" 
                    class="absolute inset-0 w-full h-full" 
                    src="https://www.youtube.com/embed/tlI022AbnCI?enablejsapi=1" 
                    title="Demo Video" frameborder="0" 
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                    allowfullscreen>
            </iframe>
        </div>
    </div>
</div>

<script>
    const modal = document.getElementById('demoModal');
    const modalContent = document.getElementById('modalContent');
    const videoFrame = document.getElementById('demoVideo');
    let videoSrc = videoFrame.src; // Simpan link asli

    function openDemoModal() {
        modal.classList.remove('hidden');
        // Animasi Fade In sedikit delay biar halus
        setTimeout(() => {
            modal.classList.remove('opacity-0');
            modalContent.classList.remove('scale-95');
            modalContent.classList.add('scale-100');
        }, 10);
        
        // Autoplay (tambah parameter autoplay di URL)
        videoFrame.src = videoSrc + "&autoplay=1";
    }

    function closeDemoModal() {
        // Animasi Out
        modal.classList.add('opacity-0');
        modalContent.classList.remove('scale-100');
        modalContent.classList.add('scale-95');

        setTimeout(() => {
            modal.classList.add('hidden');
            // Matikan video saat ditutup (reset src)
            videoFrame.src = videoSrc; 
        }, 300); // Sesuaikan dengan durasi transition CSS
    }

    // Tutup jika klik di luar video (background gelap)
    modal.addEventListener('click', function(e) {
        if (e.target === modal) {
            closeDemoModal();
        }
    });
</script>
@endsection