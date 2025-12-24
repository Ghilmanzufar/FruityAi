<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;

class CleanupFruits extends Command
{
    // Nama perintah yang nanti dipanggil robot
    protected $signature = 'fruits:cleanup';

    // Deskripsi perintah
    protected $description = 'Menghapus foto buah yang sudah lebih dari 1 jam';

    public function handle()
    {
        $path = public_path('fruits');

        // Cek apakah folder ada
        if (!File::exists($path)) {
            $this->info('Folder fruits tidak ditemukan.');
            return;
        }

        $files = File::files($path);
        $count = 0;

        foreach ($files as $file) {
            // Ambil waktu terakhir file dibuat/diedit
            $lastModified = Carbon::createFromTimestamp($file->getMTime());

            // LOGIKA: Jika file lebih tua dari 60 menit (1 jam)
            if (Carbon::now()->diffInMinutes($lastModified) > 60) {
                File::delete($file);
                $count++;
            }
        }

        $this->info("Berhasil menghapus $count foto lama.");
    }
}