@extends('layouts.app')

@section('content')
<div class="bg-emerald-600 py-20 relative overflow-hidden">
    <div class="absolute top-0 left-0 w-64 h-64 bg-white opacity-10 rounded-full mix-blend-overlay filter blur-3xl animate-blob"></div>
    <div class="absolute bottom-0 right-0 w-64 h-64 bg-yellow-300 opacity-10 rounded-full mix-blend-overlay filter blur-3xl animate-blob animation-delay-2000"></div>

    <div class="max-w-4xl mx-auto px-4 text-center relative z-10">
        <span class="bg-emerald-500 text-emerald-100 text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider mb-4 inline-block">
            Skripsi Informatika 2025
        </span>
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-6 leading-tight">
            Menggabungkan <span class="text-yellow-300">Kecerdasan Buatan</span> <br>
            dengan Gaya Hidup Sehat
        </h1>
        <p class="text-emerald-100 text-lg max-w-2xl mx-auto leading-relaxed">
            FruityAI bukan sekadar buku resep. Ini adalah asisten cerdas yang membantu Anda mengurangi limbah makanan dengan memanfaatkan apa yang ada di kulkas Anda.
        </p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-16 relative z-20 pb-20">
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-20">
        <div class="bg-white p-8 rounded-3xl shadow-xl border border-slate-100 text-center hover:transform hover:-translate-y-2 transition-all duration-300">
            <div class="w-16 h-16 bg-blue-50 text-blue-500 rounded-2xl flex items-center justify-center mx-auto mb-6 text-2xl">
                <i class="fa-brands fa-python"></i>
            </div>
            <h3 class="font-bold text-xl text-slate-800 mb-2">Python & YOLOv8</h3>
            <p class="text-slate-500 text-sm">
                Menggunakan algoritma Computer Vision mutakhir untuk mendeteksi objek (buah/sayur) secara real-time dengan akurasi tinggi.
            </p>
        </div>

        <div class="bg-white p-8 rounded-3xl shadow-xl border border-slate-100 text-center hover:transform hover:-translate-y-2 transition-all duration-300">
            <div class="w-16 h-16 bg-red-50 text-red-500 rounded-2xl flex items-center justify-center mx-auto mb-6 text-2xl">
                <i class="fa-brands fa-laravel"></i>
            </div>
            <h3 class="font-bold text-xl text-slate-800 mb-2">Laravel Framework</h3>
            <p class="text-slate-500 text-sm">
                Dibangun di atas framework PHP terpopuler yang menjamin keamanan, kecepatan, dan skalabilitas aplikasi web.
            </p>
        </div>

        <div class="bg-white p-8 rounded-3xl shadow-xl border border-slate-100 text-center hover:transform hover:-translate-y-2 transition-all duration-300">
            <div class="w-16 h-16 bg-teal-50 text-teal-500 rounded-2xl flex items-center justify-center mx-auto mb-6 text-2xl">
                <i class="fa-solid fa-wind"></i>
            </div>
            <h3 class="font-bold text-xl text-slate-800 mb-2">Tailwind CSS</h3>
            <p class="text-slate-500 text-sm">
                Desain antarmuka modern yang responsif, bersih, dan nyaman di mata pengguna (User Friendly).
            </p>
        </div>
    </div>

    <div class="bg-white rounded-3xl shadow-sm border border-slate-200 overflow-hidden flex flex-col md:flex-row">
        <div class="md:w-1/3 bg-slate-100 relative h-64 md:h-auto">
            <img src="{{ asset('storage/profile.jpg') }}" 
                class="absolute inset-0 w-full h-full object-cover grayscale hover:grayscale-0 transition-all duration-500" 
                alt="Foto Pengembang">
        </div>
        
        <div class="md:w-2/3 p-10 flex flex-col justify-center">
            <div class="flex items-center gap-3 mb-4">
                <span class="h-1 w-10 bg-emerald-500 rounded-full"></span>
                <span class="text-emerald-600 font-bold uppercase tracking-widest text-sm">Meet the Developer</span>
            </div>
            
            <h2 class="text-3xl font-bold text-slate-800 mb-4">Ghilman Zufar</h2>
            <p class="text-slate-500 leading-relaxed mb-6">
                Mahasiswa Teknik Informatika yang memiliki ketertarikan mendalam pada pengembangan Web dan Kecerdasan Buatan (AI). 
                Aplikasi ini dibuat sebagai syarat kelulusan dan bentuk kontribusi teknologi untuk gaya hidup yang lebih sehat.
            </p>
            
            <div class="flex gap-4">
                <a href="https://github.com/Ghilmanzufar" class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center text-slate-600 hover:bg-slate-800 hover:text-white transition-colors">
                    <i class="fa-brands fa-github"></i>
                </a>
                <a href="https://www.linkedin.com/in/ghilman-zufar/" class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center text-slate-600 hover:bg-blue-600 hover:text-white transition-colors">
                    <i class="fa-brands fa-linkedin-in"></i>
                </a>
                <a href="https://www.instagram.com/ghilmanzfr?igsh=MXd4eGx0ejJjMnk1dA%3D%3D&utm_source=qr" class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center text-slate-600 hover:bg-pink-600 hover:text-white transition-colors">
                    <i class="fa-brands fa-instagram"></i>
                </a>
            </div>
        </div>
    </div>

</div>
@endsection