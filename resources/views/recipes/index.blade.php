@extends('layouts.app')

@section('content')
<div class="min-h-screen py-12 px-4 sm:px-6 lg:px-8 bg-slate-50">
    <div class="max-w-7xl mx-auto">
        
        <div class="flex flex-col md:flex-row justify-between items-center mb-10">
            <div class="text-center md:text-left mb-4 md:mb-0">
                <h1 class="text-3xl font-bold text-slate-800">
                    <i class="fa-solid fa-utensils text-emerald-500 mr-2"></i> 
                    {{ isset($searchQuery) ? 'Hasil Pencarian' : 'Daftar Resep' }}
                </h1>
                <p class="text-slate-500 mt-2">
                    @if(isset($searchQuery))
                        Menampilkan resep: <span class="font-bold text-emerald-600">{{ $searchQuery }}</span>
                    @else
                        Temukan inspirasi masak hari ini
                    @endif
                </p>
            </div>

            @auth
            <div class="flex gap-3">
                <a href="{{ route('recipes.create') }}" class="bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-2 px-6 rounded-xl shadow-lg hover:shadow-emerald-200 transition duration-300 flex items-center">
                    <i class="fa-solid fa-plus mr-2"></i> Tambah
                </a>
                
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-6 rounded-xl shadow-lg hover:shadow-red-200 transition duration-300 flex items-center">
                        <i class="fa-solid fa-right-from-bracket mr-2"></i> Logout
                    </button>
                </form>
            </div>
            @endauth
        </div>

        <div class="mb-12">
            <h2 class="text-xl font-bold text-slate-700 mb-6 border-l-4 border-emerald-500 pl-4">
                Koleksi Dapur Kami
            </h2>

            @if($recipes->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($recipes as $recipe)
                        <div class="bg-white rounded-2xl shadow-sm hover:shadow-lg transition duration-300 border border-slate-100 overflow-hidden group flex flex-col h-full">
                            
                            <div class="relative h-48 overflow-hidden">
                                <img src="{{ $recipe->image_url }}" alt="{{ $recipe->title }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                                
                                @auth
                                <div class="absolute top-2 right-2 flex gap-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <a href="{{ route('recipes.edit', $recipe->id) }}" class="bg-yellow-400 hover:bg-yellow-500 text-white p-2 rounded-lg shadow-sm backdrop-blur-sm" title="Edit Resep">
                                        <i class="fa-solid fa-pen"></i>
                                    </a>
                                    <form action="{{ route('recipes.destroy', $recipe->id) }}" method="POST" onsubmit="return confirm('Yakin hapus resep ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white p-2 rounded-lg shadow-sm backdrop-blur-sm" title="Hapus Resep">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                                @endauth
                            </div>

                            <div class="p-6 flex flex-col flex-grow">
                                <div class="flex justify-between items-start mb-2">
                                    <span class="bg-emerald-100 text-emerald-700 text-xs font-bold px-2 py-1 rounded uppercase tracking-wide">
                                        {{ $recipe->main_ingredient }}
                                    </span>
                                    <span class="text-slate-400 text-xs flex items-center">
                                        <i class="fa-regular fa-clock mr-1"></i> {{ $recipe->cooking_time }} mnt
                                    </span>
                                </div>
                                <h3 class="text-xl font-bold text-slate-800 mb-2 leading-tight">{{ $recipe->title }}</h3>
                                <p class="text-slate-500 text-sm line-clamp-2 mb-4 flex-grow">{{ $recipe->description }}</p>
                                
                                <a href="{{ route('recipes.show', $recipe->slug) }}" class="mt-auto block w-full text-center bg-slate-50 hover:bg-emerald-50 text-slate-700 hover:text-emerald-600 font-bold py-3 rounded-xl transition-colors">
                                    Lihat Resep
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="bg-white rounded-2xl p-8 text-center border border-dashed border-slate-300">
                    <p class="text-slate-400">Belum ada resep tersimpan. @auth <a href="{{ route('recipes.create') }}" class="text-emerald-500 font-bold">Buat Sekarang?</a> @endauth</p>
                </div>
            @endif
        </div>

        @if(isset($searchQuery) && $searchQuery != '')
            <div id="ai-section" class="mb-12">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-xl font-bold text-slate-700 border-l-4 border-purple-500 pl-4">
                        Rekomendasi Chef AI 🤖
                    </h2>
                    <span class="text-xs bg-purple-100 text-purple-700 px-3 py-1 rounded-full font-bold animate-pulse">
                        ✨ Sedang meracik resep baru...
                    </span>
                </div>

                <div id="ai-results-container" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @for($i = 0; $i < 3; $i++)
                    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden animate-pulse">
                        <div class="h-48 bg-slate-200"></div>
                        <div class="p-6">
                            <div class="h-4 bg-slate-200 rounded w-1/3 mb-4"></div>
                            <div class="h-6 bg-slate-200 rounded w-3/4 mb-4"></div>
                            <div class="h-4 bg-slate-200 rounded w-full mb-2"></div>
                            <div class="h-4 bg-slate-200 rounded w-full mb-6"></div>
                            <div class="h-10 bg-slate-200 rounded-xl w-full"></div>
                        </div>
                    </div>
                    @endfor
                </div>
            </div>
        @endif

    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ingredient = "{{ $searchQuery ?? '' }}";
        if (!ingredient) return;

        fetch("{{ route('recipes.generate-ai') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            body: JSON.stringify({ ingredient: ingredient })
        })
        .then(response => response.json())
        .then(data => {
            const container = document.getElementById('ai-results-container');
            container.innerHTML = ''; 

            if (data.recipes && data.recipes.length > 0) {
                data.recipes.forEach(recipe => {
                   const imageUrl = `https://placehold.co/600x400/f1f5f9/10b981?text=${encodeURIComponent(recipe.title)}`;

                    const html = `
                        <div class="bg-white rounded-2xl shadow-sm hover:shadow-lg transition duration-300 border border-purple-100 overflow-hidden group relative">
                            <div class="absolute top-4 right-4 z-10">
                                <span class="bg-white/90 backdrop-blur text-purple-600 text-xs font-bold px-3 py-1 rounded-full shadow-sm border border-purple-200">
                                    ✨ AI Generated
                                </span>
                            </div>
                            <div class="relative h-48 overflow-hidden bg-slate-100">
                                <img src="${imageUrl}" alt="${recipe.title}" class="w-full h-full object-cover opacity-90 group-hover:opacity-100 transition duration-500">
                            </div>
                            <div class="p-6">
                                <div class="flex justify-between items-start mb-2">
                                    <span class="bg-purple-100 text-purple-700 text-xs font-bold px-2 py-1 rounded uppercase tracking-wide">Chef AI</span>
                                    <span class="text-slate-400 text-xs flex items-center"><i class="fa-regular fa-clock mr-1"></i> ${recipe.cooking_time} mnt</span>
                                </div>
                                <h3 class="text-xl font-bold text-slate-800 mb-2 leading-tight">${recipe.title}</h3>
                                <p class="text-slate-500 text-sm line-clamp-2 mb-4">${recipe.description}</p>
                                <form action="{{ route('recipes.preview-ai') }}" method="POST" target="_blank">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="title" value="${recipe.title}">
                                    <input type="hidden" name="description" value="${recipe.description}">
                                    <input type="hidden" name="cooking_time" value="${recipe.cooking_time}">
                                    <input type="hidden" name="calories" value="${recipe.calories}">
                                    ${recipe.ingredients.map(ing => `<input type="hidden" name="ingredients[]" value="${ing}">`).join('')}
                                    ${recipe.steps.map(step => `<input type="hidden" name="steps[]" value="${step}">`).join('')}
                                    <button type="submit" class="w-full text-center bg-purple-50 hover:bg-purple-100 text-purple-700 font-bold py-3 rounded-xl transition-colors">
                                        Lihat Detail Resep <i class="fa-solid fa-arrow-right ml-2"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    `;
                    container.innerHTML += html;
                });
            } else {
                container.innerHTML = '<p class="col-span-3 text-center text-slate-400">Maaf, AI sedang sibuk atau tidak menemukan resep.</p>';
            }
        })
        .catch(error => {
            console.error('Error:', error);
            const container = document.getElementById('ai-results-container');
            container.innerHTML = '<p class="col-span-3 text-center text-red-400">Gagal memuat resep AI. Coba lagi nanti.</p>';
        });
    });
</script>
@endsection