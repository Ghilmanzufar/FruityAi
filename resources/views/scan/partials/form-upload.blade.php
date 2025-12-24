@if(session('image_file'))
    <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-slate-100 relative p-6 animate-fade-in-up">
        
        <div class="text-center mb-4">
            <h3 class="font-bold text-slate-700">Foto yang Dianalisis</h3>
            <p class="text-xs text-slate-400">File tersimpan sementara</p>
        </div>

        <div class="relative group">
            <img src="{{ asset('fruits/' . session('image_file')) }}" 
                 alt="Hasil Scan" 
                 class="w-full h-72 object-cover rounded-2xl shadow-sm border border-slate-100">
            
            <div class="absolute top-4 right-4 bg-emerald-500 text-white text-xs font-bold px-3 py-1 rounded-full shadow-lg flex items-center gap-1">
                <i class="fa-solid fa-check"></i> Selesai
            </div>
        </div>

        <div class="mt-6">
            <a href="{{ route('scan.index') }}" class="w-full bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold py-3 rounded-xl transition-colors flex justify-center items-center gap-2 border border-slate-200">
                <i class="fa-solid fa-rotate-right"></i> Scan Ulang
            </a>
        </div>

    </div>

@else
    <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-slate-100 relative">
        <div class="p-8">
            <form action="{{ route('scan.store') }}" method="POST" enctype="multipart/form-data" id="scanForm">
                @csrf
                
                <div class="w-full relative group">
                    <input id="imageInput" name="images[]" type="file" class="hidden" accept="image/*" multiple onchange="previewImages(event)" />

                    <label for="imageInput" id="dropzoneLabel" class="flex flex-col items-center justify-center w-full h-72 border-2 border-emerald-300 border-dashed rounded-2xl cursor-pointer bg-emerald-50 hover:bg-emerald-100 transition-all duration-300">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6 text-center">
                            <div class="w-16 h-16 bg-white text-emerald-500 rounded-full flex items-center justify-center shadow-sm mb-4 group-hover:scale-110 transition-transform">
                                <i class="fa-solid fa-images text-3xl"></i>
                            </div>
                            <p class="mb-2 text-sm text-slate-600"><span class="font-bold">Pilih Banyak Foto</span> / Drag & Drop</p>
                            <p class="text-xs text-slate-400">Bisa upload lebih dari 1 foto sekaligus</p>
                        </div>
                    </label>

                    <div id="previewContainer" class="hidden w-full mt-4">
                        <div class="flex justify-between items-center mb-2">
                            <p class="text-xs text-slate-400">Foto terpilih:</p>
                            <button type="button" onclick="document.getElementById('imageInput').click()" class="text-xs bg-emerald-100 text-emerald-700 px-2 py-1 rounded-md font-bold hover:bg-emerald-200 transition-colors">
                                + Tambah Foto
                            </button>
                        </div>
                        <div id="galleryGrid" class="grid grid-cols-3 gap-2 max-h-60 overflow-y-auto p-2 bg-slate-50 rounded-xl border border-slate-200"></div>
                        <button type="button" onclick="resetPreview()" class="mt-2 text-red-500 text-xs hover:underline w-full text-center">
                            Hapus Semua Foto
                        </button>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4 mt-6">
                    <button type="button" onclick="openCameraModal()" class="bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold py-3 rounded-xl transition-colors flex justify-center items-center gap-2 border border-slate-200">
                        <i class="fa-solid fa-camera"></i> Kamera
                    </button>
                    <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-3 rounded-xl shadow-lg hover:shadow-emerald-500/30 transition-all transform hover:-translate-y-1 flex justify-center items-center gap-2">
                        <i class="fa-solid fa-magnifying-glass"></i> Analisis
                    </button>
                </div>
            </form>
        </div>

        <div id="loadingOverlay" class="absolute inset-0 bg-white/90 backdrop-blur-sm flex flex-col items-center justify-center z-50 hidden">
            <div class="animate-spin rounded-full h-16 w-16 border-t-4 border-b-4 border-emerald-500 mb-4"></div>
            <p class="text-emerald-700 font-semibold animate-pulse">Sedang Memproses...</p>
        </div>
    </div>
@endif