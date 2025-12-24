<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->string('title');            // Judul: Jus Alpukat Kocok
            $table->string('slug')->unique();   // URL ramah: jus-alpukat-kocok
            $table->string('main_ingredient');  // Kunci AI: 'alpukat' (Harus sama dengan label Roboflow)
            $table->string('image_url');        // Foto Masakan
            $table->text('description');        // Deskripsi singkat
            $table->integer('calories')->nullable(); // Info Gizi
            $table->integer('cooking_time');    // Dalam menit
            $table->json('ingredients');        // Daftar bahan (disimpan sebagai JSON)
            $table->json('steps');              // Langkah-langkah (disimpan sebagai JSON)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipes');
    }
};
