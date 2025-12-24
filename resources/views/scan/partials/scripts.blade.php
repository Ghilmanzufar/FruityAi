<script>
    // --- VARIABLES ---
    const video = document.getElementById('videoElement');
    const canvas = document.getElementById('canvasElement');
    const cameraModal = document.getElementById('cameraModal');
    let stream = null;
    let basket = []; 

    // [BARU] WADAH PENAMPUNG FILE (Supaya bisa nambah terus)
    const fileAccumulator = new DataTransfer();

    // --- LOGIKA KAMERA ---
    async function openCameraModal() {
        cameraModal.classList.remove('hidden');
        try {
            stream = await navigator.mediaDevices.getUserMedia({ video: { facingMode: 'environment' } });
            video.srcObject = stream;
        } catch (err) {
            alert("Gagal mengakses kamera: " + err);
            closeCameraModal();
        }
    }

    function closeCameraModal() {
        cameraModal.classList.add('hidden');
        if (stream) {
            stream.getTracks().forEach(track => track.stop());
            video.srcObject = null;
        }
    }

    function takeSnapshot() {
        canvas.width = video.videoWidth;
        canvas.height = video.videoHeight;
        const context = canvas.getContext('2d');
        context.drawImage(video, 0, 0, canvas.width, canvas.height);

        canvas.toBlob(function(blob) {
            // Buat nama file unik biar gak bentrok
            const fileName = "camera_" + Date.now() + ".jpg";
            const file = new File([blob], fileName, { type: "image/jpeg" });

            // [UPDATE] Masukkan ke Accumulator, bukan replace
            fileAccumulator.items.add(file);
            
            // Update Input Asli
            document.getElementById('imageInput').files = fileAccumulator.files;
            
            // Update Tampilan Grid
            updateGalleryUI();
            
            closeCameraModal();
        }, 'image/jpeg', 0.95);
    }

    // --- LOGIKA UPLOAD FORM (MULTIPLE + APPEND) ---
    function previewImages(event) {
        const input = event.target;
        
        // Jika user memilih file baru
        if (input.files && input.files.length > 0) {
            
            // Masukkan file-file BARU ke Accumulator
            Array.from(input.files).forEach(file => {
                fileAccumulator.items.add(file);
            });

            // Update Input Asli agar isinya = Accumulator (File Lama + File Baru)
            // Ini penting supaya saat submit, semua file terkirim
            input.files = fileAccumulator.files;

            // Update Tampilan
            updateGalleryUI();
        }
    }

    // Fungsi Render Tampilan Grid (Dipisah biar rapi)
    function updateGalleryUI() {
        const dropzoneLabel = document.getElementById('dropzoneLabel');
        const previewContainer = document.getElementById('previewContainer');
        const galleryGrid = document.getElementById('galleryGrid');

        // Sembunyikan dropzone besar, tampilkan preview
        dropzoneLabel.classList.add('hidden');
        previewContainer.classList.remove('hidden');
        galleryGrid.innerHTML = ''; // Reset tampilan grid

        // Loop isi Accumulator untuk ditampilkan
        Array.from(fileAccumulator.files).forEach((file, index) => {
            const reader = new FileReader();
            reader.onload = function(e) {
                // Buat kotak gambar
                const imgDiv = document.createElement('div');
                imgDiv.className = 'relative aspect-square rounded-lg overflow-hidden border border-slate-300 shadow-sm group';
                
                imgDiv.innerHTML = `
                    <img src="${e.target.result}" class="w-full h-full object-cover">
                    <button type="button" onclick="removeSingleFile(${index})" class="absolute top-1 right-1 bg-red-500 text-white rounded-full w-5 h-5 flex items-center justify-center text-xs opacity-0 group-hover:opacity-100 transition-opacity">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                `;
                galleryGrid.appendChild(imgDiv);
            }
            reader.readAsDataURL(file);
        });
    }

    // [BARU] Fungsi Hapus 1 Gambar dari list
    function removeSingleFile(indexToRemove) {
        const newDt = new DataTransfer();
        
        // Salin semua file KECUALI yang mau dihapus
        Array.from(fileAccumulator.files).forEach((file, i) => {
            if (i !== indexToRemove) {
                newDt.items.add(file);
            }
        });

        // Update Accumulator Global
        fileAccumulator.items.clear();
        Array.from(newDt.files).forEach(file => fileAccumulator.items.add(file));

        // Update Input Form
        document.getElementById('imageInput').files = fileAccumulator.files;

        // Cek kalau habis, reset tampilan
        if (fileAccumulator.files.length === 0) {
            resetPreview();
        } else {
            updateGalleryUI();
        }
    }

    function resetPreview() {
        // Kosongkan Accumulator
        fileAccumulator.items.clear();
        
        document.getElementById('imageInput').value = ""; 
        document.getElementById('dropzoneLabel').classList.remove('hidden');
        document.getElementById('previewContainer').classList.add('hidden');
        document.getElementById('galleryGrid').innerHTML = '';
    }

    const form = document.getElementById('scanForm');
    if(form) {
        form.addEventListener('submit', function() {
            // Cek ada file gak
            if(document.getElementById('imageInput').files.length === 0) {
                alert("Pilih minimal satu foto!");
                event.preventDefault();
                return;
            }
            document.getElementById('loadingOverlay').classList.remove('hidden');
            document.getElementById('loadingOverlay').classList.add('flex');
        });
    }

    // --- LOGIKA KERANJANG BAHAN (SAMA SEPERTI SEBELUMNYA) ---
    @if(session('detections'))
        const aiResults = @json(session('detections'));
        aiResults.forEach(item => {
            if (!basket.includes(item.name)) basket.push(item.name);
        });
    @endif

    document.addEventListener('DOMContentLoaded', function() {
        renderBasket();
    });

    function addManualItem() {
        const select = document.getElementById('manualSelect');
        const value = select.value;
        if (value && !basket.includes(value)) {
            basket.push(value);
            renderBasket();
            select.value = "";
        } else if (basket.includes(value)) {
            alert('Bahan ini sudah ada di keranjang!');
        }
    }

    function removeItem(ingredient) {
        basket = basket.filter(item => item !== ingredient);
        renderBasket();
    }

    function renderBasket() {
        const container = document.getElementById('ingredientList');
        const hiddenContainer = document.getElementById('hiddenInputs');
        const badge = document.getElementById('totalItemsBadge');
        
        if(!container || !hiddenContainer) return; 

        container.innerHTML = '';
        hiddenContainer.innerHTML = '';
        
        if (basket.length === 0) {
            container.innerHTML = '<span class="text-slate-400 text-sm italic w-full text-center py-2">Keranjang kosong...</span>';
            badge.innerText = '0 Item';
            return;
        }

        basket.forEach(item => {
            const tag = document.createElement('div');
            tag.className = 'flex items-center gap-2 bg-emerald-50 border border-emerald-200 text-emerald-700 px-3 py-2 rounded-lg text-sm font-bold shadow-sm animate-fade-in-up';
            const label = item.charAt(0).toUpperCase() + item.slice(1);
            tag.innerHTML = `<span>${label}</span><button type="button" onclick="removeItem('${item}')" class="text-emerald-400 hover:text-red-500 transition-colors ml-1"><i class="fa-solid fa-xmark"></i></button>`;
            container.appendChild(tag);

            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'ingredients[]'; 
            input.value = item;
            hiddenContainer.appendChild(input);
        });
        badge.innerText = basket.length + ' Item';
    }
</script>

<style>
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in-up {
        animation: fadeInUp 0.5s ease-out forwards;
    }
</style>