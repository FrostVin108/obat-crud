<?php

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
use App\Http\Controllers\ObatController;

use App\Models\Obat;

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


// Route::get('edit/{id}' [ObatController::class; 'edit'] function(){
//     return redirect('edit');
// })->name('obat.edit');

// Route::post('edit/{id}'); [ ObatController::class,'update'];
// return redirect('edit');

Route::get('/edit/{id}', [ObatController::class, 'edit'])->name('obat.edit');

Route::put('/update/{id}', [ObatController::class, 'update'])->name('obat.update');

route::get('/tes1', [ObatController::class, 'tes']);
