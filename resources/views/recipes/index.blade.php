@extends('layouts.app')

@section('content')
<div class="bg-slate-50 min-h-screen py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center mb-12">
            <h1 class="text-3xl font-bold text-slate-800">
                Jelajahi <span class="text-emerald-500">Resep Sehat</span>
            </h1>
            <p class="text-slate-500 mt-2">Temukan inspirasi masakan dari bahan yang kamu punya.</p>
            
            @auth
            <div class="mt-6 flex justify-center gap-4">
                <a href="{{ route('recipes.create') }}" class="inline-flex items-center gap-2 bg-slate-800 text-white px-5 py-2 rounded-full text-sm font-bold hover:bg-slate-700 transition-colors shadow-lg">
                    <i class="fa-solid fa-plus"></i> Tambah Resep Baru
                </a>
                
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="inline-flex items-center gap-2 bg-red-50 text-red-600 border border-red-200 px-5 py-2 rounded-full text-sm font-bold hover:bg-red-100 transition-colors">
                        <i class="fa-solid fa-right-from-bracket"></i> Logout
                    </button>
                </form>
            </div>
            @endauth
        </div>

        <div class="flex flex-wrap justify-center gap-3 mb-10">
            
            <a href="{{ route('recipes.index') }}" 
               class="px-4 py-2 rounded-full border border-slate-200 shadow-sm text-sm font-medium transition-colors
               {{ !request('ingredient') ? 'bg-slate-800 text-white border-slate-800' : 'bg-white text-slate-600 hover:bg-emerald-50 hover:text-emerald-600' }}">
               Semua
            </a>

            @php
                $fruits = [
                    'banana' => ['name' => 'Pisang', 'icon' => '🍌'],
                    'avocado' => ['name' => 'Alpukat', 'icon' => '🥑'],
                    'watermelon' => ['name' => 'Semangka', 'icon' => '🍉'],
                    'grape' => ['name' => 'Anggur', 'icon' => '🍇'],
                    'apple' => ['name' => 'Apel', 'icon' => '🍎'],
                    'starfruit' => ['name' => 'Belimbing', 'icon' => '⭐'],
                    'dragonfruit' => ['name' => 'Buah Naga', 'icon' => '🐉'],
                    'cherry' => ['name' => 'Cherry', 'icon' => '🍒'],
                    'durian' => ['name' => 'Durian', 'icon' => '🦔'],
                    'guava' => ['name' => 'Jambu Biji', 'icon' => '🍈'],
                    'orange' => ['name' => 'Jeruk', 'icon' => '🍊'],
                    'longan' => ['name' => 'Kelengkeng', 'icon' => '🥔'],
                    'kiwi' => ['name' => 'Kiwi', 'icon' => '🥝'],
                    'date' => ['name' => 'Kurma', 'icon' => '🟤'],
                    'lychee' => ['name' => 'Leci', 'icon' => '🔴'],
                    'lemon' => ['name' => 'Lemon', 'icon' => '🍋'],
                    'mango' => ['name' => 'Mangga', 'icon' => '🥭'],
                    'mangosteen' => ['name' => 'Manggis', 'icon' => '🟣'],
                    'passionfruit' => ['name' => 'Markisa', 'icon' => '🟡'],
                    'melon' => ['name' => 'Melon', 'icon' => '🍈'],
                    'pineapple' => ['name' => 'Nanas', 'icon' => '🍍'],
                    'jackfruit' => ['name' => 'Nangka', 'icon' => '🟡'],
                    'pear' => ['name' => 'Pear', 'icon' => '🍐'],
                    'snakefruit' => ['name' => 'Salak', 'icon' => '🐍'],
                    'sapodilla' => ['name' => 'Sawo', 'icon' => '🥔'],
                    'sugarapple' => ['name' => 'Srikaya', 'icon' => '🟢'],
                    'strawberry' => ['name' => 'Strawberry', 'icon' => '🍓'],
                ];
            @endphp

            @foreach($fruits as $key => $fruit)
                <a href="{{ route('recipes.index', ['ingredient' => $key]) }}" 
                   class="px-4 py-2 rounded-full border shadow-sm text-sm font-medium transition-colors
                   {{ request('ingredient') == $key 
                        ? 'bg-emerald-100 text-emerald-800 border-emerald-300' 
                        : 'bg-white text-slate-600 border-slate-200 hover:bg-emerald-50 hover:text-emerald-600' 
                   }}">
                   {{ $fruit['icon'] }} {{ $fruit['name'] }}
                </a>
            @endforeach

        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($recipes as $recipe)
            <div class="group bg-white rounded-2xl shadow-sm hover:shadow-xl border border-slate-100 overflow-hidden transition-all duration-300 transform hover:-translate-y-1 flex flex-col h-full">
                
                <a href="{{ route('recipes.show', $recipe->slug) }}" class="block relative h-48 overflow-hidden">
                    <img src="{{ $recipe->image_url }}" alt="{{ $recipe->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute top-3 right-3 bg-white/90 backdrop-blur-sm px-2 py-1 rounded-lg text-xs font-bold text-slate-700 shadow-sm">
                        ⏱ {{ $recipe->cooking_time }} Menit
                    </div>
                </a>

                <div class="p-6 flex flex-col flex-grow">
                    <div class="flex items-center gap-2 mb-2">
                        <span class="text-xs font-bold text-emerald-600 bg-emerald-50 px-2 py-1 rounded-md uppercase tracking-wider">
                            {{ $recipe->main_ingredient }}
                        </span>
                        <span class="text-xs text-slate-400 flex items-center gap-1">
                            <i class="fa-solid fa-fire text-orange-400"></i> {{ $recipe->calories ?? '-' }} kkal
                        </span>
                    </div>
                    
                    <a href="{{ route('recipes.show', $recipe->slug) }}" class="block">
                        <h3 class="text-xl font-bold text-slate-800 mb-2 group-hover:text-emerald-600 transition-colors">
                            {{ $recipe->title }}
                        </h3>
                    </a>

                    <p class="text-slate-500 text-sm line-clamp-2 mb-4 flex-grow">
                        {{ $recipe->description }}
                    </p>

                    @auth
                        <div class="flex justify-end gap-2 mt-auto pt-4 border-t border-slate-100">
                            <a href="{{ route('recipes.edit', $recipe->id) }}" class="text-blue-500 hover:text-blue-700 p-2 bg-blue-50 rounded-lg transition-colors" title="Edit Resep">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>

                            <form action="{{ route('recipes.destroy', $recipe->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus resep ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700 p-2 bg-red-50 rounded-lg transition-colors" title="Hapus Resep">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    @endauth
                </div>
            </div>
            @endforeach
        </div>

        @if($recipes->isEmpty())
        <div class="text-center py-20">
            <p class="text-slate-400">Belum ada resep untuk kategori ini.</p>
        </div>
        @endif

    </div>
</div>
@endsection