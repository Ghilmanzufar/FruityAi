<div id="cameraModal" class="fixed inset-0 z-50 hidden bg-black/80 backdrop-blur-sm flex items-center justify-center p-4">
    <div class="bg-white rounded-3xl overflow-hidden w-full max-w-lg shadow-2xl relative">
        <div class="bg-slate-900 p-4 flex justify-between items-center">
            <h3 class="text-white font-bold">Ambil Foto</h3>
            <button onclick="closeCameraModal()" class="text-slate-400 hover:text-white">
                <i class="fa-solid fa-xmark text-xl"></i>
            </button>
        </div>
        
        <div class="relative bg-black h-80 flex items-center justify-center overflow-hidden">
            <video id="videoElement" autoplay playsinline class="absolute inset-0 w-full h-full object-cover transform scale-x-[-1]"></video> 
            <canvas id="canvasElement" class="hidden"></canvas>
            <div class="absolute inset-0 border-2 border-white/30 rounded-lg m-8 pointer-events-none"></div>
        </div>

        <div class="p-6 bg-slate-50 flex justify-center gap-4">
            <button onclick="takeSnapshot()" class="w-16 h-16 rounded-full bg-white border-4 border-emerald-500 flex items-center justify-center hover:bg-emerald-50 transition-colors shadow-lg">
                <div class="w-12 h-12 bg-emerald-500 rounded-full"></div>
            </button>
        </div>
    </div>
</div>