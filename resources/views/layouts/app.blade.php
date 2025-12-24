<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FruityAI - Smart Pantry</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />

    <style>
        body { font-family: 'Poppins', sans-serif; }
        /* Animasi halus untuk semua transisi */
        .transition-all { transition-property: all; transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1); transition-duration: 300ms; }
    </style>
</head>
<body class="bg-slate-50 text-slate-700">

    <nav class="bg-white shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                
                <div class="flex items-center gap-2">
                    <i class="fa-solid fa-leaf text-emerald-500 text-2xl"></i>
                    <a href="/" class="font-bold text-xl tracking-wide text-slate-800">
                        Fruity<span class="text-emerald-500">AI</span>
                    </a>
                </div>

                <div class="hidden md:flex space-x-8">
                    <a href="/" class="text-slate-500 hover:text-emerald-600 font-medium transition-all {{ request()->is('/') ? 'text-emerald-600' : '' }}">Beranda</a>
                    <a href="{{ route('scan.index') }}" class="text-slate-500 hover:text-emerald-600 font-medium transition-all {{ request()->is('scan*') ? 'text-emerald-600' : '' }}">Scan Buah</a>
                    <a href="{{ route('recipes.index') }}" class="text-slate-500 hover:text-emerald-600 font-medium transition-all {{ request()->is('recipes*') ? 'text-emerald-600' : '' }}">Resep</a>
                    <a href="{{ route('about') }}" class="text-slate-500 hover:text-emerald-600 font-medium transition-all {{ request()->is('about') ? 'text-emerald-600' : '' }}">Tentang</a>
                    @guest
                        <a href="{{ route('login') }}" class="text-slate-400 hover:text-emerald-600 text-sm"><i class="fa-solid fa-lock"></i></a>
                    @endguest
                </div>

                <div class="flex items-center gap-4">
                    <a href="{{ route('scan.index') }}" class="bg-emerald-500 hover:bg-emerald-600 text-white px-4 py-2 text-sm md:text-base md:px-5 rounded-full font-semibold shadow-md hover:shadow-lg transition-all">
                        Scan 📸
                    </a>

                    <button id="mobile-menu-btn" class="md:hidden text-slate-500 hover:text-emerald-600 focus:outline-none">
                        <i class="fa-solid fa-bars text-2xl"></i>
                    </button>
                </div>
            </div>
        </div>

        <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-slate-100 absolute w-full left-0 shadow-lg">
            <div class="px-4 pt-2 pb-4 space-y-1">
                <a href="/" class="block px-3 py-3 rounded-md text-base font-medium text-slate-700 hover:text-emerald-600 hover:bg-emerald-50 transition-colors">
                    <i class="fa-solid fa-house w-6 text-center"></i> Beranda
                </a>
                <a href="{{ route('scan.index') }}" class="block px-3 py-3 rounded-md text-base font-medium text-slate-700 hover:text-emerald-600 hover:bg-emerald-50 transition-colors">
                    <i class="fa-solid fa-camera w-6 text-center"></i> Scan Buah
                </a>
                <a href="{{ route('recipes.index') }}" class="block px-3 py-3 rounded-md text-base font-medium text-slate-700 hover:text-emerald-600 hover:bg-emerald-50 transition-colors">
                    <i class="fa-solid fa-utensils w-6 text-center"></i> Resep
                </a>
                <a href="{{ route('about') }}" class="block px-3 py-3 rounded-md text-base font-medium text-slate-700 hover:text-emerald-600 hover:bg-emerald-50 transition-colors">
                    <i class="fa-solid fa-circle-info w-6 text-center"></i> Tentang
                </a>
            </div>
        </div>
    </nav>

    <script>
        const btn = document.getElementById('mobile-menu-btn');
        const menu = document.getElementById('mobile-menu');

        btn.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });
    </script>

    <main>
        @yield('content')
    </main>

    <footer class="bg-white mt-20 py-10 border-t border-slate-200">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <p class="text-slate-400 text-sm">© 2025 FruityAI. Dibuat oleh 🥗 Ghilman Ganteng </p>
        </div>
    </footer>

</body>
</html>