<?php

use App\Mail\resetPass;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlateController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\NewPasswordController;


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

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth'  ,'verified'])->group(function () {
    Route::view('/add',"add")->name('add');
    Route::post('/add', [PlateController::class , 'addPlates']);
    Route::get('/dashboard', [PlateController::class , 'getPlates'])->name('dashboard');
    Route::get('/delete/{id}', [PlateController::class , 'deletePlate'])->name('delete');
    Route::get('/edit/{id}', [PlateController::class , 'editPlate'])->name('edit');
    Route::put('/{id}', [PlateController::class , 'updatePlate']);
});


Route::middleware('auth' ,'verified')->group(function () {
    Route::get('/home', [PlateController::class , 'getPlates'])->name('home');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
