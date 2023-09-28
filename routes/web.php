<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WineController;
use App\Models\Bar;
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
Route::get('/',[HomeController::class, 'home'])->name('home');
///home route tiene que ser asi en fortify


Route::get('/home', function(){
    return redirect()->route('home');
})->name('home2');


Route::get('/bars',[BarController::class, 'index'])->name('bars.index');
//ahora solo las de este grupo sn accesibles a auth=usuarios registrados
Route::group(['middleware' => 'auth'],function(){
    Route::get('/bars/create',[BarController::class,'create'])->name('bars.create');
    Route::post('/bars/create',[BarController::class, 'store'])->name('bars.store');
    Route::get('/bars/edit/{bar}',[BarController::class,'edit'])->name('bars.edit');
    Route::post('/bars/update/{bar}',[BarController::class, 'update'])->name('bars.update');
    Route::post('/bars/delete/{bar}',[BarController::class, 'delete'])->name('bars.delete');

});
Route::get ('/bars/proposals/{user}',[BarController::class,'proposals'])->name('bars.proposals');
Route::get('/bars/{bar}',[BarController::class,'show'])->name('bars.show');//antes el parametro era id, pero para hacer la dependency injection lo cambio por el nombre de la variable del modelo
Route::get('/bar/{name}',[BarController::class,'friendly'])->name('bars.friendly');

Route::resource('/wine',WineController::class)->parameters(['wines']);

Route::get('/contacto',[ContactController::class, 'create'])->name('contact');
Route::post('/contacto',[ContactController::class, 'store']); //no tengo que poner name de nuevo por que es la misma ruta
Auth::routes();


