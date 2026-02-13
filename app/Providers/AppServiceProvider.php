<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        // MATIKAN (KOMENTARI) BARIS INI KALAU PAKAI LOCALHOST BIASA:
        // \Illuminate\Support\Facades\URL::forceScheme('https'); 
        
        // Biarkan kosong saja atau hapus baris di atas.
    }
}