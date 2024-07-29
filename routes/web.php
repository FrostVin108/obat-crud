<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
use App\Http\Controllers\ObloginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ObatController;
use App\Views\Auth;
use APp\Views\Passwords;
use App\Models\Obat;
use App\Models\User;

Route::get('/obat', function () {
    return view('indexobat');
})->name('obat.index');

Route::get('/create', function () {
    return view('create');
});

Route::get('', function () {
    $obat = Obat::get(); 
    
    return view('store', compact('obat'));
})->name('obat.store');

Route::delete('destroy/{id}', [ ObatController::class, 'destroy']
)->name('obats.destroy');
 
Route::post('store', [ ObatController::class, 'create']
)->name('obat.create');

Route::get('/edit/{id}', [ObatController::class, 'edit'])->name('obat.edit');

Route::put('/update/{id}', [ObatController::class, 'update'])->name('obat.update');

Route::get('search', [ObatController::class,'search'])->name('search');

// \Illuminate\Support\Facades\Auth::routes();

route::post('/register', [HomeController::class, 'register']);

Route::get('/register', function(){
    return view('register');
})->name('obat.register');

Route::post('/login', [HomeController::class,'authenticate'])->name('obat.login');

Route::get('/login', function(){
    return view('login');
})->name('obat.login');

// Route::get('/verify', [ObatController::class,'verify']);

// Route::get('/confirm', [ObatController::class,'confirm']);

// Route::get('/email', [ObatController::class,'email']);

// Route::get('/reset', [ObatController::class,'reset']);

