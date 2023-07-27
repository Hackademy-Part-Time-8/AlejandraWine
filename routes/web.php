<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarController;
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

Route::get('/', function () {
    return view('home');
});


Route::get('/bar',[BarController::class, 'index'])->name('bars.index');

Route::get('/bar/{id}',[BarController::class,'show'])->name('bars.show');


