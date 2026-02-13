@extends('layouts.app')

@section('content')
<div class="bg-slate-50 min-h-screen py-10">
    <div class="max-w-4xl mx-auto px-4">
        
        <div class="text-center mb-10">
            <h1 class="text-3xl font-bold text-slate-800">Edit Resep ✏️</h1>
            <p class="text-slate-500">Perbarui informasi resep: {{ $recipe->title }}</p>
        </div>

        <div class="bg-white rounded-3xl shadow-lg border border-slate-100 overflow-hidden">
            <form action="{{ route('recipes.update', $recipe->id) }}" method="POST" enctype="multipart/form-data" class="p-8 space-y-8">
                @csrf
                @method('PUT') <div>
                    <h3 class="text-lg font-bold text-emerald-600 mb-4 flex items-center gap-2">
                        <i class="fa-solid fa-circle-info"></i> Informasi Dasar
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="col-span-2">
                            <label class="block text-sm font-bold text-slate-700 mb-2">Nama Masakan</label>
                            <input type="text" name="title" required value="{{ old('title', $recipe->title) }}" 
                                   class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 focus:bg-white focus:border-emerald-500 focus:ring-2 focus:ring-emerald-200 transition-all outline-none">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">Bahan Utama (Deteksi AI)</label>
                            <select name="main_ingredient" class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 focus:bg-white focus:border-emerald-500 focus:ring-2 focus:ring-emerald-200 transition-all outline-none">
                                @php $ingredients = ['banana','avocado', 'markisa','orange', 'kurma','leci', 'cherry', 'kiwi' ,'apple','mango','watermelon','papaya','pineapple','dragonfruit','strawberry','durian','jackfruit','soursop','breadfruit','lime','mangosteen','snakefruit','starfruit','longan','melon','guava', 'grape']; @endphp
                                @foreach($ingredients as $ing)
                                    <option value="{{ $ing }}" {{ $recipe->main_ingredient == $ing ? 'selected' : '' }}>{{ ucfirst($ing) }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">Foto Masakan (Biarkan kosong jika tidak ganti)</label>
                            <input type="file" name="image" accept="image/*" 
                                   class="w-full text-sm text-slate-500 border border-slate-300 rounded-xl bg-slate-50 file:mr-4 file:py-3 file:px-4 file:rounded-l-xl file:border-0 file:text-sm file:font-bold file:bg-slate-200 file:text-slate-700 hover:file:bg-emerald-100 hover:file:text-emerald-700 transition-all cursor-pointer">
                            <p class="text-xs text-slate-400 mt-2">Foto saat ini: <a href="{{ $recipe->image_url }}" target="_blank" class="text-emerald-500 hover:underline">Lihat Foto</a></p>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">Waktu Masak (Menit)</label>
                            <input type="number" name="cooking_time" required value="{{ $recipe->cooking_time }}" 
                                   class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 focus:bg-white focus:border-emerald-500 focus:ring-2 focus:ring-emerald-200 transition-all outline-none">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">Kalori (kkal)</label>
                            <input type="number" name="calories" value="{{ $recipe->calories }}" 
                                   class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 focus:bg-white focus:border-emerald-500 focus:ring-2 focus:ring-emerald-200 transition-all outline-none">
                        </div>

                        <div class="col-span-2">
                            <label class="block text-sm font-bold text-slate-700 mb-2">Deskripsi Singkat</label>
                            <textarea name="description" rows="3" required class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 focus:bg-white focus:border-emerald-500 focus:ring-2 focus:ring-emerald-200 transition-all outline-none">{{ $recipe->description }}</textarea>
                        </div>
                    </div>
                </div>

                <hr class="border-slate-100">

                <div>
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-bold text-emerald-600 flex items-center gap-2">
                            <i class="fa-solid fa-basket-shopping"></i> Bahan-bahan
                        </h3>
                        <button type="button" onclick="addIngredient()" class="text-sm bg-emerald-50 text-emerald-600 px-4 py-2 rounded-full font-bold hover:bg-emerald-100 transition-colors border border-emerald-200">
                            + Tambah Baris
                        </button>
                    </div>
                    
                    <div id="ingredient-list" class="space-y-3">
                        @foreach($recipe->ingredients as $ing)
                        <div class="flex gap-2">
                            <input type="text" name="ingredients[]" required value="{{ $ing }}" class="flex-1 rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 focus:bg-white focus:border-emerald-500 focus:ring-2 focus:ring-emerald-200 transition-all outline-none">
                            <button type="button" onclick="this.parentElement.remove()" class="text-red-400 hover:text-red-600 px-3 transition-colors"><i class="fa-solid fa-trash"></i></button>
                        </div>
                        @endforeach
                    </div>
                </div>

                <hr class="border-slate-100">

                <div>
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-bold text-emerald-600 flex items-center gap-2">
                            <i class="fa-solid fa-fire-burner"></i> Langkah Pembuatan
                        </h3>
                        <button type="button" onclick="addStep()" class="text-sm bg-emerald-50 text-emerald-600 px-4 py-2 rounded-full font-bold hover:bg-emerald-100 transition-colors border border-emerald-200">
                            + Tambah Langkah
                        </button>
                    </div>
                    
                    <div id="step-list" class="space-y-3">
                        @foreach($recipe->steps as $index => $step)
                        <div class="flex gap-2 items-start">
                            <span class="mt-3 text-emerald-600 font-bold text-sm w-8 text-center bg-emerald-50 py-1 rounded-md border border-emerald-100 step-number">{{ $index + 1 }}</span>
                            <textarea name="steps[]" required rows="2" class="flex-1 rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 focus:bg-white focus:border-emerald-500 focus:ring-2 focus:ring-emerald-200 transition-all outline-none">{{ $step }}</textarea>
                            <button type="button" onclick="this.parentElement.remove()" class="text-red-400 hover:text-red-600 px-3 mt-3 transition-colors"><i class="fa-solid fa-trash"></i></button>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="pt-6 border-t border-slate-100 flex gap-4">
                    <a href="{{ route('recipes.index') }}" class="w-1/3 bg-slate-100 text-slate-600 font-bold py-4 rounded-xl text-center hover:bg-slate-200 transition-colors">Batal</a>
                    <button type="submit" class="w-2/3 bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-4 rounded-xl shadow-lg transition-transform transform hover:-translate-y-1">
                        Simpan Perubahan ✅
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

<script>
    const inputClass = "flex-1 rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 focus:bg-white focus:border-emerald-500 focus:ring-2 focus:ring-emerald-200 transition-all outline-none";

    function addIngredient() {
        const container = document.getElementById('ingredient-list');
        const div = document.createElement('div');
        div.className = 'flex gap-2 animate-fade-in';
        div.innerHTML = `
            <input type="text" name="ingredients[]" required placeholder="Bahan selanjutnya..." class="${inputClass}">
            <button type="button" onclick="this.parentElement.remove()" class="text-red-400 hover:text-red-600 px-3 transition-colors"><i class="fa-solid fa-trash"></i></button>
        `;
        container.appendChild(div);
    }

    function addStep() {
        const container = document.getElementById('step-list');
        const count = container.children.length + 1;
        const div = document.createElement('div');
        div.className = 'flex gap-2 items-start animate-fade-in';
        div.innerHTML = `
            <span class="mt-3 text-emerald-600 font-bold text-sm w-8 text-center bg-emerald-50 py-1 rounded-md border border-emerald-100 step-number">${count}</span>
            <textarea name="steps[]" required rows="2" placeholder="Langkah selanjutnya..." class="${inputClass}"></textarea>
            <button type="button" onclick="this.parentElement.remove()" class="text-red-400 hover:text-red-600 px-3 mt-3 transition-colors"><i class="fa-solid fa-trash"></i></button>
        `;
        container.appendChild(div);
    }
</script>
@endsection