<div class="space-y-6">
    
    @if ($errors->any())
        <div class="bg-red-50 text-red-600 p-4 rounded-xl border border-red-200 flex items-center gap-3">
            <i class="fa-solid fa-circle-exclamation"></i>
            <span>{{ $errors->first() }}</span>
        </div>
    @endif

    @if(session('success'))
        
        <div class="bg-white rounded-3xl shadow-xl border border-slate-100 p-6 animate-fade-in-up relative overflow-hidden">
            
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-xl font-bold text-slate-800 flex items-center gap-2">
                    <i class="fa-solid fa-basket-shopping text-emerald-500"></i> Bahan Terkumpul
                </h2>
                <span id="totalItemsBadge" class="bg-emerald-100 text-emerald-700 px-3 py-1 rounded-full text-xs font-bold">
                    0 Item
                </span>
            </div>

            <p class="text-sm text-slate-500 mb-4">
                Cek kembali bahan yang terdeteksi. Hapus yang salah, atau tambah manual jika ada yang kurang.
            </p>

            <div id="ingredientList" class="flex flex-wrap gap-2 mb-6 min-h-[50px] p-4 bg-slate-50 rounded-2xl border border-slate-200 border-dashed">
                <span class="text-slate-400 text-sm italic w-full text-center py-2">Keranjang kosong...</span>
            </div>

            <div class="flex gap-2 mb-6">
                <div class="relative flex-1">
                    <select id="manualSelect" class="block w-full pl-4 pr-8 py-3 border border-slate-300 rounded-xl bg-white focus:ring-emerald-500 focus:border-emerald-500 appearance-none text-sm">
                        <option value="" disabled selected>+ Tambah Manual...</option>
                        
                        <option value="avocado">🥑 Alpukat</option>
                        <option value="grape">🍇 Anggur</option>
                        <option value="apple">🍎 Apel</option>
                        
                        <option value="starfruit">⭐ Belimbing</option>
                        <option value="dragonfruit">🐉 Buah Naga</option>
                        
                        <option value="cherry">🍒 Cherry</option>
                        
                        <option value="durian">🥥 Durian</option>
                        
                        <option value="guava">🟢 Jambu Biji</option>
                        <option value="orange">🍊 Jeruk</option>
                        
                        <option value="longan">🟤 Kelengkeng</option>
                        <option value="kiwi">🥝 Kiwi</option>
                        <option value="dates">🟤 Kurma</option>
                        
                        <option value="lychee">🔴 Leci</option>
                        <option value="lemon">🍋 Lemon</option>
                        
                        <option value="mango">🥭 Mangga</option>
                        <option value="mangosteen">🟣 Manggis</option>
                        <option value="passionfruit">🟡 Markisa</option>
                        <option value="melon">🍈 Melon</option>
                        
                        <option value="pineapple">🍍 Nanas</option>
                        <option value="jackfruit">🟡 Nangka</option>
                        
                        <option value="pear">🍐 Pear</option>
                        <option value="papaya">🍈 Pepaya</option>
                        <option value="banana">🍌 Pisang</option>
                        
                        <option value="snakefruit">🟤 Salak</option>
                        <option value="sapodilla">🟤 Sawo</option>
                        <option value="watermelon">🍉 Semangka</option>
                        <option value="sugarapple">🟢 Srikaya</option>
                        <option value="strawberry">🍓 Strawberry</option>
                    </select>
                    
                    <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                        <i class="fa-solid fa-chevron-down text-slate-400 text-xs"></i>
                    </div>
                </div>
                <button type="button" onclick="addManualItem()" class="bg-emerald-100 text-emerald-700 hover:bg-emerald-200 px-4 rounded-xl font-bold transition-colors">
                    <i class="fa-solid fa-plus"></i>
                </button>
            </div>

            <form action="{{ route('recipes.search') }}" method="GET" id="searchForm">
                <div id="hiddenInputs"></div>
                
                <button type="submit" class="w-full bg-slate-800 hover:bg-slate-900 text-white font-bold py-4 rounded-xl shadow-lg transition-transform transform hover:-translate-y-1 flex justify-center items-center gap-2">
                    <i class="fa-solid fa-magnifying-glass"></i> 
                    Cari Resep
                </button>
            </form>
        </div>

    @else
        <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-100 text-center text-slate-500">
            <div class="flex flex-col items-center py-4">
                <i class="fa-solid fa-image text-4xl text-slate-200 mb-3"></i>
                <p>Silakan upload atau foto buah untuk melihat hasilnya.</p>
            </div>
            
            <div class="mt-4 pt-4 border-t border-slate-50">
                <p class="text-xs text-slate-400 mb-2">Mendukung deteksi:</p>
                <div class="flex flex-wrap justify-center gap-1 opacity-70">
                     <span class="text-[10px] px-2 py-1 bg-slate-50 rounded-full border">🍌 Pisang</span>
                     <span class="text-[10px] px-2 py-1 bg-slate-50 rounded-full border">🥑 Alpukat</span>
                     <span class="text-[10px] px-2 py-1 bg-slate-50 rounded-full border">🍎 Apel</span>
                     <span class="text-[10px] px-2 py-1 bg-slate-50 rounded-full border">dll...</span>
                </div>
            </div>
         </div>
    @endif
</div>