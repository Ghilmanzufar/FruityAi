@extends('layouts.app')

@section('content')
<div class="min-h-screen py-12 px-4 sm:px-6 lg:px-8 bg-slate-50">
    <div class="max-w-4xl mx-auto">
        
        <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-slate-100 mb-8">
            <div class="relative h-64 md:h-96 w-full">
                <img src="{{ $recipe->image_url }}" alt="{{ $recipe->title }}" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                
                <div class="absolute bottom-0 left-0 p-8 w-full">
                    <span class="bg-emerald-500 text-white text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wide mb-2 inline-block">
                        {{ $recipe->main_ingredient }}
                    </span>

                    <h1 class="text-3xl md:text-4xl font-bold text-white mb-2 leading-tight">
                        {{ $recipe->title }}
                    </h1>
                    
                    <div class="flex items-center text-slate-200 text-sm gap-4">
                        <span class="flex items-center gap-1"><i class="fa-regular fa-clock"></i> {{ $recipe->cooking_time }} Menit</span>
                        <span class="flex items-center gap-1"><i class="fa-solid fa-fire"></i> {{ $recipe->calories ?? '-' }} kkal</span>
                    </div>
                </div>
            </div>

            <div class="p-8 border-b border-slate-100">
                <p class="text-slate-600 leading-relaxed text-lg italic">
                    "{{ $recipe->description }}"
                </p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
            
            <div class="md:col-span-1">
                <div class="bg-white rounded-3xl shadow-lg p-6 border border-slate-100 sticky top-4">
                    <h3 class="text-xl font-bold text-slate-800 mb-4 flex items-center gap-2">
                        <i class="fa-solid fa-basket-shopping text-emerald-500"></i> Bahan
                    </h3>
                    <ul class="space-y-3">
                        @foreach($recipe->ingredients as $ingredient)
                        <li class="flex items-start gap-3 text-slate-600 text-sm">
                            <i class="fa-solid fa-check text-emerald-400 mt-1"></i>
                            <span>{{ $ingredient }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="md:col-span-2">
                <div class="bg-white rounded-3xl shadow-lg p-8 border border-slate-100">
                    <h3 class="text-xl font-bold text-slate-800 mb-6 flex items-center gap-2">
                        <i class="fa-solid fa-fire-burner text-orange-500"></i> Cara Membuat
                    </h3>
                    
                    <div class="space-y-8">
                        @foreach($recipe->steps as $index => $step)
                        <div class="flex gap-4">
                            <div class="flex-shrink-0 w-8 h-8 bg-emerald-100 text-emerald-600 rounded-full flex items-center justify-center font-bold text-sm">
                                {{ $index + 1 }}
                            </div>
                            <p class="text-slate-600 leading-relaxed mt-1">
                                {{ $step }}
                            </p>
                        </div>
                        @endforeach
                    </div>

                    <div class="mt-10 bg-emerald-50 rounded-xl p-6 text-center border border-emerald-100">
                        <h3 class="text-emerald-800 font-bold text-lg mb-2">Selamat Menikmati! 🍽️</h3>
                        <p class="text-emerald-600 text-sm mb-4">Berhasil masak ini? Share ke teman-temanmu!</p>
                        <div class="flex justify-center gap-3">
                            <a href="https://wa.me/?text=Coba%20resep%20*{{ urlencode($recipe->title) }}*%20ini,%20enak%20banget!" target="_blank" class="bg-green-500 text-white px-4 py-2 rounded-lg text-sm font-bold flex items-center gap-2 hover:bg-green-600 transition">
                                <i class="fa-brands fa-whatsapp"></i> WhatsApp
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-8 border-t border-slate-200 pt-8 pb-12">
            
            @if(isset($recipe->id))
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('recipes.index') }}" class="bg-slate-200 hover:bg-slate-300 text-slate-700 font-bold py-3 px-6 rounded-xl transition-colors flex items-center justify-center gap-2">
                        <i class="fa-solid fa-arrow-left"></i> Kembali
                    </a>

                    <button onclick="openCookingMode()" class="bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-3 px-8 rounded-xl shadow-lg shadow-emerald-200 transition transform hover:scale-105 flex items-center justify-center gap-2">
                        <i class="fa-solid fa-play"></i> Mulai Masak (Step-by-Step)
                    </button>
                </div>
            @endif

            @if(!isset($recipe->id)) 
                <div class="bg-purple-50 border border-purple-200 rounded-2xl p-6 text-center shadow-lg">
                    <h3 class="text-purple-800 font-bold text-lg mb-2">
                        <i class="fa-solid fa-wand-magic-sparkles mr-1"></i> Resep AI Generated
                    </h3>
                    <p class="text-purple-600 text-sm mb-4">Simpan resep ini agar tidak hilang!</p>
                    <form action="{{ route('recipes.store-ai') }}" method="POST">
                        @csrf
                        <input type="hidden" name="title" value="{{ $recipe->title }}">
                        <input type="hidden" name="description" value="{{ $recipe->description }}">
                        <input type="hidden" name="cooking_time" value="{{ $recipe->cooking_time }}">
                        <input type="hidden" name="calories" value="{{ $recipe->calories }}">
                        <input type="hidden" name="main_ingredient" value="{{ $recipe->main_ingredient }}">
                        <input type="hidden" name="image_url" value="{{ $recipe->image_url }}">
                        @foreach($recipe->ingredients as $ing) <input type="hidden" name="ingredients[]" value="{{ $ing }}"> @endforeach
                        @foreach($recipe->steps as $step) <input type="hidden" name="steps[]" value="{{ $step }}"> @endforeach
                        
                        <div class="flex justify-center gap-4">
                            <button type="submit" class="bg-purple-600 text-white font-bold py-3 px-8 rounded-xl shadow-lg">Simpan</button>
                            <a href="{{ route('recipes.index') }}" class="bg-white text-slate-500 font-bold py-3 px-6 rounded-xl border">Batal</a>
                        </div>
                    </form>
                </div>
            @endif
        </div>
    </div>
</div>

<div id="cookingOverlay" class="fixed inset-0 bg-slate-900 z-50 hidden flex-col transition-opacity duration-300 opacity-0">
    
    <div class="bg-slate-800 p-4 flex justify-between items-center shadow-lg relative z-10">
        <h2 class="text-white font-bold text-lg truncate pr-4">{{ $recipe->title }}</h2>
        <button onclick="closeCookingMode()" class="text-slate-400 hover:text-white transition bg-slate-700 hover:bg-slate-600 rounded-lg px-3 py-1 text-sm font-bold">
            <i class="fa-solid fa-xmark mr-1"></i> Tutup
        </button>
    </div>

    <div class="flex-grow flex items-center justify-center p-6 pb-40 relative overflow-y-auto">
        
        <div class="w-full max-w-2xl text-center">
            <span class="inline-block bg-emerald-600 text-white text-sm font-bold px-3 py-1 rounded-full mb-6 shadow-lg shadow-emerald-500/30">
                Langkah <span id="stepCounter">1</span> dari <span id="totalSteps">{{ count($recipe->steps) }}</span>
            </span>

            <div id="stepContainer" class="min-h-[200px] flex items-center justify-center">
                <h3 id="stepText" class="text-2xl md:text-4xl font-bold text-white leading-relaxed animate-fade-in">
                    Loading...
                </h3>
            </div>
        </div>

    </div>

    <div class="absolute bottom-0 left-0 w-full bg-slate-800 p-6 shadow-[0_-4px_6px_-1px_rgba(0,0,0,0.3)] z-20 border-t border-slate-700">
        
        <div class="max-w-2xl mx-auto flex justify-between gap-4">
            <button id="prevBtn" onclick="prevStep()" class="flex-1 bg-slate-700 hover:bg-slate-600 text-white font-bold py-4 rounded-xl transition disabled:opacity-50 disabled:cursor-not-allowed">
                <i class="fa-solid fa-chevron-left mr-2"></i> Sebelumnya
            </button>
            
            <button id="nextBtn" onclick="nextStep()" class="flex-1 bg-emerald-500 hover:bg-emerald-600 text-white font-bold py-4 rounded-xl transition shadow-lg shadow-emerald-500/20">
                Selanjutnya <i class="fa-solid fa-chevron-right ml-2"></i>
            </button>
            
            <button id="finishBtn" onclick="closeCookingMode()" class="hidden flex-1 bg-blue-500 hover:bg-blue-600 text-white font-bold py-4 rounded-xl transition shadow-lg shadow-blue-500/20">
                Selesai Masak! <i class="fa-solid fa-check ml-2"></i>
            </button>
        </div>
        
        <div class="mt-6 w-full bg-slate-700 rounded-full h-2">
            <div id="progressBar" class="bg-emerald-500 h-2 rounded-full transition-all duration-300" style="width: 0%"></div>
        </div>

    </div>

</div>

<script>
    // DATA DARI PHP KE JS
    const steps = @json($recipe->steps);
    let currentStepIndex = 0;

    // ELEMENT REF
    const overlay = document.getElementById('cookingOverlay');
    const stepText = document.getElementById('stepText');
    const stepCounter = document.getElementById('stepCounter');
    const progressBar = document.getElementById('progressBar');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    const finishBtn = document.getElementById('finishBtn');

    // FUNGSI BUKA MODE MASAK
    function openCookingMode() {
        overlay.classList.remove('hidden');
        // Sedikit delay biar animasi opacity jalan halus
        setTimeout(() => {
            overlay.classList.remove('opacity-0');
        }, 10);
        
        currentStepIndex = 0; // Mulai dari awal
        updateUI();
    }

    // FUNGSI TUTUP MODE MASAK
    function closeCookingMode() {
        overlay.classList.add('opacity-0');
        setTimeout(() => {
            overlay.classList.add('hidden');
        }, 300);
    }

    // UPDATE TAMPILAN
    function updateUI() {
        // Update Teks Langkah
        stepText.classList.remove('animate-fade-in');
        void stepText.offsetWidth; // Trigger reflow buat reset animasi
        stepText.classList.add('animate-fade-in');
        
        stepText.innerText = steps[currentStepIndex];
        stepCounter.innerText = currentStepIndex + 1;

        // Update Progress Bar
        const progress = ((currentStepIndex + 1) / steps.length) * 100;
        progressBar.style.width = `${progress}%`;

        // Atur Tombol
        prevBtn.disabled = currentStepIndex === 0;

        if (currentStepIndex === steps.length - 1) {
            nextBtn.classList.add('hidden');
            finishBtn.classList.remove('hidden');
        } else {
            nextBtn.classList.remove('hidden');
            finishBtn.classList.add('hidden');
        }
    }

    // NAVIGASI
    function nextStep() {
        if (currentStepIndex < steps.length - 1) {
            currentStepIndex++;
            updateUI();
        }
    }

    function prevStep() {
        if (currentStepIndex > 0) {
            currentStepIndex--;
            updateUI();
        }
    }

    // KEYBOARD SHORTCUT (Panah Kanan/Kiri)
    document.addEventListener('keydown', function(event) {
        if (!overlay.classList.contains('hidden')) {
            if (event.key === "ArrowRight") nextStep();
            if (event.key === "ArrowLeft") prevStep();
            if (event.key === "Escape") closeCookingMode();
        }
    });
</script>

<style>
    /* Animasi kecil buat teks */
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in {
        animation: fadeInUp 0.5s ease-out forwards;
    }
</style>
@endsection