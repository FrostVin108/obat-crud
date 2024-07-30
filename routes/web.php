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

Route::put('/updatestock/{id}', [ObatController::class, 'updatestock'])->name('updatestock');

Route::get('search', [ObatController::class,'search'])->name('search');

// \Illuminate\Support\Facades\Auth::routes();

// route::post('/register', [HomeController::class, 'register']);

// Route::get('/register', function(){
//     return view('register');
// })->name('obat.register');

// Route::get('login', [HomeController::class,'login'])->name('login');

// Route::get('/loginOB', function(){
//     return view('login');
// })->name('obat.login');

Route::get('dtable',[ObatController::class, 'dtable'] )->name('obat.dtable');

Route::get('/login',[ObatController::class,'loglte'] )->name('obat.loginlte');

Route::get('/register',[ObatController::class,'reglte'])->name('obat.registerlte');

// route::get('/tes',[ObatController::class,'tes'] )->name('obat.update');