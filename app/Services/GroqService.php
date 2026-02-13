<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class GroqService
{
    protected $apiKey;
    protected $baseUrl = 'https://api.groq.com/openai/v1/chat/completions';

    protected $casts = [
        'ingredients' => 'array',
        'steps' => 'array',
    ];

    public function __construct()
    {
        $this->apiKey = env('GROQ_API_KEY');
    }

    public function generateRecipes($fruitName)
    {
        // 1. MANTRA (Prompt) AGAR AI NURUT
        $systemPrompt = "Kamu adalah Chef Profesional yang kreatif. 
        Tugasmu adalah membuat 3 resep masakan unik, modern, dan lezat berbahan dasar: {$fruitName}.
        
        PENTING:
        1. Jangan berikan pengantar atau penutup (seperti 'Tentu, ini resepnya').
        2. Keluarkan HANYA data JSON valid.
        3. Struktur JSON harus persis seperti ini:
        {
            \"recipes\": [
                {
                    \"title\": \"Nama Masakan\",
                    \"description\": \"Deskripsi singkat yang menggugah selera\",
                    \"cooking_time\": \"angka (menit)\",
                    \"calories\": \"angka (kkal)\",
                    \"ingredients\": [\"bahan 1\", \"bahan 2\"],
                    \"steps\": [\"Langkah 1\", \"Langkah 2\"]
                }
            ]
        }
        4. Gunakan Bahasa Indonesia yang gaul tapi sopan.";

        // 2. KIRIM REQUEST KE GROQ
        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->apiKey,
                'Content-Type'  => 'application/json',
            ])->post($this->baseUrl, [
                'model'    => 'llama-3.3-70b-versatile', // Model ini Cepat & Gratis
                'messages' => [
                    ['role' => 'system', 'content' => $systemPrompt],
                    ['role' => 'user', 'content' => "Buatkan 3 resep olahan $fruitName sekarang."],
                ],
                'temperature' => 0.7, // 0.7 agar kreatif tapi tidak ngawur
                'response_format' => ['type' => 'json_object'] // Maksa output JSON (Fitur baru Groq)
            ]);

            // 3. CEK APAKAH BERHASIL
            if ($response->successful()) {
                $data = $response->json();
                $content = $data['choices'][0]['message']['content'];
                
                // Decode JSON string dari AI menjadi Array PHP
                return json_decode($content, true);
            } else {
                // Jika error (misal API Key salah)
                return ['error' => 'Gagal menghubungi koki AI.'];
            }

        } catch (\Exception $e) {
            return ['error' => 'Terjadi kesalahan koneksi: ' . $e->getMessage()];
        }
    }
}