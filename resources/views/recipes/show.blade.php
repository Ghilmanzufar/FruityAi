@extends('layouts.app')

@section('content')
<div class="bg-slate-50 min-h-screen py-10">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <a href="{{ route('recipes.index') }}" class="inline-flex items-center text-slate-500 hover:text-emerald-600 font-medium mb-6 transition-colors">
            <i class="fa-solid fa-arrow-left mr-2"></i> Kembali ke Katalog
        </a>

        <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-slate-100">
            <div class="grid grid-cols-1 lg:grid-cols-2">
                
                <div class="relative h-96 lg:h-auto">
                    <img src="{{ $recipe->image_url }}" alt="{{ $recipe->title }}" class="absolute inset-0 w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent lg:hidden"></div>
                    
                    <div class="absolute bottom-0 left-0 p-6 text-white lg:hidden">
                        <span class="bg-emerald-500 text-xs font-bold px-2 py-1 rounded uppercase tracking-wide">
                            {{ $recipe->main_ingredient }}
                        </span>
                        <h1 class="text-3xl font-bold mt-2 shadow-sm">{{ $recipe->title }}</h1>
                    </div>
                </div>

                <div class="p-8 lg:p-12 flex flex-col justify-center">
                    
                    <div class="hidden lg:block mb-6">
                        <span class="bg-emerald-100 text-emerald-700 text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wide">
                            Bahan Utama: {{ ucfirst($recipe->main_ingredient) }}
                        </span>
                        <h1 class="text-4xl font-bold text-slate-800 mt-3 leading-tight">{{ $recipe->title }}</h1>
                    </div>

                    <p class="text-slate-500 text-lg mb-8 leading-relaxed">
                        {{ $recipe->description }}
                    </p>

                    <div class="grid grid-cols-3 gap-4 border-t border-b border-slate-100 py-6 mb-8">
                        <div class="text-center">
                            <i class="fa-regular fa-clock text-emerald-500 text-xl mb-1"></i>
                            <p class="text-xs text-slate-400 uppercase font-bold tracking-wider">Waktu</p>
                            <p class="font-bold text-slate-700">{{ $recipe->cooking_time }} Menit</p>
                        </div>
                        <div class="text-center border-l border-slate-100">
                            <i class="fa-solid fa-fire-flame-curved text-orange-400 text-xl mb-1"></i>
                            <p class="text-xs text-slate-400 uppercase font-bold tracking-wider">Kalori</p>
                            <p class="font-bold text-slate-700">{{ $recipe->calories }} kkal</p>
                        </div>
                        <div class="text-center border-l border-slate-100">
                            <i class="fa-solid fa-list-check text-blue-400 text-xl mb-1"></i>
                            <p class="text-xs text-slate-400 uppercase font-bold tracking-wider">Bahan</p>
                            <p class="font-bold text-slate-700">{{ count($recipe->ingredients) }} Item</p>
                        </div>
                    </div>

                    <button onclick="startCooking()" class="w-full bg-slate-800 hover:bg-slate-900 text-white font-bold py-4 rounded-xl shadow-lg transition-transform transform hover:-translate-y-1">
                        <i class="fa-solid fa-play mr-2"></i> Mulai Masak Sekarang
                    </button>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mt-8">
            
            <div class="lg:col-span-1">
                <div class="bg-white rounded-3xl shadow-sm border border-slate-100 p-8 sticky top-24">
                    <h3 class="text-xl font-bold text-slate-800 mb-6 flex items-center gap-2">
                        <i class="fa-solid fa-basket-shopping text-emerald-500"></i> Bahan-bahan
                    </h3>
                    <ul class="space-y-4">
                        @foreach($recipe->ingredients as $ingredient)
                        <li class="flex items-start gap-3 text-slate-600">
                            <i class="fa-regular fa-circle-check text-emerald-400 mt-1"></i>
                            <span>{{ $ingredient }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="lg:col-span-2">
                <div class="bg-white rounded-3xl shadow-sm border border-slate-100 p-8">
                    <h3 class="text-xl font-bold text-slate-800 mb-6 flex items-center gap-2">
                        <i class="fa-solid fa-hat-chef text-emerald-500"></i> Cara Membuat
                    </h3>
                    
                    <div id="stepsContainer" class="space-y-8"> 
                        @foreach($recipe->steps as $index => $step)
                        <div class="flex gap-4">
                            <div class="flex-shrink-0 w-10 h-10 bg-emerald-100 text-emerald-600 rounded-full flex items-center justify-center font-bold text-lg">
                                {{ $index + 1 }}
                            </div>
                            <div>
                                <p class="step-text text-slate-600 leading-relaxed text-lg">
                                    {{ $step }}
                                </p>
                            </div>
                        </div>
                        @if(!$loop->last)
                            <hr class="border-slate-50 ml-14">
                        @endif
                        @endforeach
                    </div>

                    <div class="mt-10 bg-emerald-50 rounded-xl p-6 text-center border border-emerald-100">
                        <h3 class="text-emerald-800 font-bold text-lg mb-2">Selamat Menikmati! 🍽️</h3>
                        <p class="text-emerald-600 text-sm mb-4">Berhasil masak ini? Pamerkan ke teman-temanmu!</p>
                        
                        <div class="flex justify-center gap-3">
                            <a href="https://wa.me/?text=Saya%20baru%20saja%20mencoba%20resep%20*{{ urlencode($recipe->title) }}*%20di%20Aplikasi%20Resep!%20Enak%20banget!%20😋" 
                            target="_blank" 
                            class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg text-sm font-bold transition flex items-center gap-2 shadow-sm">
                                <i class="fa-brands fa-whatsapp text-lg"></i> Share WA
                            </a>

                            <a href="https://twitter.com/intent/tweet?text=Baru%20masak%20{{ urlencode($recipe->title) }}%20nih!%20Mantap." 
                            target="_blank"
                            class="bg-slate-800 hover:bg-slate-900 text-white px-4 py-2 rounded-lg text-sm font-bold transition flex items-center gap-2 shadow-sm">
                                <i class="fa-brands fa-x-twitter text-lg"></i> Tweet
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

<div id="cookingModeModal" class="fixed inset-0 z-50 bg-white hidden flex-col transition-opacity duration-300">
    <div class="flex items-center justify-between p-6 border-b border-slate-100">
        <div class="flex-1 mr-4">
            <p class="text-xs text-slate-400 font-bold mb-1 uppercase tracking-wider">Langkah <span id="currentStepNum">1</span> dari <span id="totalSteps">0</span></p>
            <div class="w-full bg-slate-100 rounded-full h-2">
                <div id="progressBar" class="bg-emerald-500 h-2 rounded-full transition-all duration-300" style="width: 0%"></div>
            </div>
        </div>
        <button onclick="closeCookingMode()" class="p-2 rounded-full hover:bg-slate-100 text-slate-400 hover:text-red-500 transition">
            <i class="fa-solid fa-xmark text-2xl"></i>
        </button>
    </div>

    <div class="flex-1 flex items-center justify-center p-8 text-center bg-slate-50">
        <div class="max-w-2xl">
            <h2 id="stepText" class="text-2xl md:text-4xl font-bold text-slate-800 leading-snug">
                Siapkan bahan...
            </h2>
        </div>
    </div>

    <div class="p-6 bg-white border-t border-slate-100 flex justify-between items-center">
        <button onclick="prevStep()" id="btnPrev" class="px-6 py-3 rounded-xl border border-slate-300 text-slate-600 font-bold hover:bg-slate-50 disabled:opacity-50 disabled:cursor-not-allowed transition">
            <i class="fa-solid fa-arrow-left mr-2"></i> Sebelumnya
        </button>
        <button onclick="nextStep()" id="btnNext" class="px-8 py-3 rounded-xl bg-emerald-500 text-white font-bold shadow-lg shadow-emerald-200 hover:bg-emerald-600 hover:scale-105 transition transform flex items-center">
            Selanjutnya <i class="fa-solid fa-arrow-right ml-2"></i>
        </button>
    </div>
</div>


<script>
    let currentStepIndex = 0;
    let stepsData = [];

    function startCooking() {
        // 1. Ambil teks dari langkah-langkah yang sudah kita tandai di Langkah 1
        const stepElements = document.querySelectorAll('#stepsContainer .step-text');
        
        stepsData = [];
        stepElements.forEach(el => {
            // Bersihkan spasi berlebih
            stepsData.push(el.innerText.trim());
        });

        if (stepsData.length === 0) {
            alert("Tidak ada langkah memasak yang ditemukan!");
            return;
        }

        // 2. Tampilkan Layar Fullscreen
        const modal = document.getElementById('cookingModeModal');
        modal.classList.remove('hidden');
        modal.classList.add('flex');

        // 3. Mulai dari langkah pertama
        currentStepIndex = 0;
        renderStep();
    }

    function closeCookingMode() {
        const modal = document.getElementById('cookingModeModal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }

    function renderStep() {
        // Update Teks
        document.getElementById('stepText').innerText = stepsData[currentStepIndex];
        
        // Update Angka Indikator
        document.getElementById('currentStepNum').innerText = currentStepIndex + 1;
        document.getElementById('totalSteps').innerText = stepsData.length;

        // Update Progress Bar
        const percentage = ((currentStepIndex + 1) / stepsData.length) * 100;
        document.getElementById('progressBar').style.width = `${percentage}%`;

        // Atur Tombol
        const btnPrev = document.getElementById('btnPrev');
        const btnNext = document.getElementById('btnNext');

        btnPrev.disabled = (currentStepIndex === 0);

        if (currentStepIndex === stepsData.length - 1) {
            btnNext.innerHTML = 'Selesai <i class="fa-solid fa-check ml-2"></i>';
            btnNext.onclick = closeCookingMode;
            btnNext.classList.remove('bg-emerald-500');
            btnNext.classList.add('bg-slate-800');
        } else {
            btnNext.innerHTML = 'Selanjutnya <i class="fa-solid fa-arrow-right ml-2"></i>';
            btnNext.onclick = nextStep;
            btnNext.classList.add('bg-emerald-500');
            btnNext.classList.remove('bg-slate-800');
        }
    }

    function nextStep() {
        if (currentStepIndex < stepsData.length - 1) {
            currentStepIndex++;
            renderStep();
        }
    }

    function prevStep() {
        if (currentStepIndex > 0) {
            currentStepIndex--;
            renderStep();
        }
    }
</script>
@endsection
