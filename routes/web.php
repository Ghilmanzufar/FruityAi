<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FruitController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AuthController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// --- JALUR PUBLIK (Bisa Diakses Siapa Saja) ---
Route::get('/', function () { return view('welcome'); });
Route::get('/about', [PageController::class, 'about'])->name('about');

// Scan Buah
Route::get('/scan', [FruitController::class, 'index'])->name('scan.index');
Route::post('/scan', [FruitController::class, 'store'])->name('scan.store');

// Lihat Resep (Katalog & Detail) - INI TETAP PUBLIK
Route::get('/recipes', [RecipeController::class, 'index'])->name('recipes.index');
Route::get('/recipes/detail/{slug}', [RecipeController::class, 'show'])->name('recipes.show'); // Ganti URL dikit biar ga bentrok
Route::get('/recipes/search', [RecipeController::class, 'search'])->name('recipes.search');
// Route untuk AJAX AI (Letakkan di dalam group middleware auth atau public, sesuai kebutuhan)
Route::post('/recipes/generate-ai', [App\Http\Controllers\RecipeController::class, 'generateAiRecipes'])->name('recipes.generate-ai');
Route::post('/recipes/preview-ai', [App\Http\Controllers\RecipeController::class, 'previewAi'])->name('recipes.preview-ai');
Route::post('/recipes/store-ai', [App\Http\Controllers\RecipeController::class, 'storeAi'])->name('recipes.store-ai');

// Login & Logout
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// --- JALUR KHUSUS ADMIN (Middleware 'auth') ---
Route::middleware(['auth'])->group(function () {
    
    // 1. Create (Sudah ada)
    Route::get('/recipes/create', [RecipeController::class, 'create'])->name('recipes.create');
    Route::post('/recipes', [RecipeController::class, 'store'])->name('recipes.store');
    
    // 2. Edit (Update) - BARU
    Route::get('/recipes/{recipe}/edit', [RecipeController::class, 'edit'])->name('recipes.edit');
    Route::put('/recipes/{recipe}', [RecipeController::class, 'update'])->name('recipes.update');

    // 3. Delete (Hapus) - BARU
    Route::delete('/recipes/{recipe}', [RecipeController::class, 'destroy'])->name('recipes.destroy');
});