<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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
    return redirect()->route('laptops.index');
});


Route::resource('laptops', LaptopController::class);

Route::get('laptops/{laptop}/confirm', [LaptopController::class, 
'confirmDestroy'])->name('laptops.confirm');