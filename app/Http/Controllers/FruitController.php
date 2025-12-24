<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class FruitController extends Controller
{
    // 1. Menampilkan Halaman Scan
    public function index()
    {
        return view('scan');
    }

    public function store(Request $request)
    {
        // 1. Validasi Array Gambar
        $request->validate([
            'images' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg|max:5120', // Maks 5MB
        ]);

        $allDetections = [];
        $savedFiles = []; // Penampung nama file agar bisa ditampilkan di View

        // 2. Loop Setiap Gambar yang Diupload
        if($request->hasFile('images')) {
            foreach($request->file('images') as $image) {
                
                // A. Generate Nama File Unik & Simpan ke folder public/fruits
                // Kita simpan di 'public/fruits' agar sinkron dengan Scheduler yang kita buat tadi
                $fileName = time() . '_' . $image->getClientOriginalName();
                $destinationPath = public_path('fruits');
                
                // Pindahkan file
                $image->move($destinationPath, $fileName);
                
                // Path lengkap untuk Python script
                $fullPath = $destinationPath . '/' . $fileName;
                
                // Simpan nama file untuk dikirim ke View (agar user bisa lihat gambarnya)
                $savedFiles[] = $fileName; 

                // B. Panggil Python untuk gambar ini
                // Pastikan detect.py mencetak output JSON yang valid
                $command = "python " . base_path('detect.py') . " " . escapeshellarg($fullPath) . " 2>&1";
                $output = shell_exec($command);
                
                // C. Decode Hasil
                $cleanOutput = trim($output);
                $result = json_decode($cleanOutput, true);

                // D. Gabungkan Hasil ke Array Utama
                if (json_last_error() === JSON_ERROR_NONE && is_array($result)) {
                    $allDetections = array_merge($allDetections, $result);
                }
            }
        }

        // 3. Balik ke Halaman Scan dengan Data
        // Kita tidak menghapus file disini (File::delete) karena itu tugas Scheduler nanti.
        return back()->with('success', 'Analisis Selesai!')
                     // Kirim nama file gambar pertama untuk ditampilkan background/preview
                     ->with('image_file', $savedFiles[0] ?? null) 
                     ->with('detections', $allDetections);
    }
}