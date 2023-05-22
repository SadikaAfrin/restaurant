<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ItemController;
use App\Http\Controllers\Admin\SpecialmanuController;
use App\Http\Controllers\Admin\ReservationController;




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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/reservation', [App\Http\Controllers\HomeController::class, 'reserve'])->name('reservation.reserve');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('slider', SliderController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('item', ItemController::class);
    Route::resource('specialmanu', SpecialmanuController::class);

    Route::get('reservation', [ReservationController::class, 'index'])->name('reservation.index');
    Route::post('reservation/status{id}', [ReservationController::class, 'status'])->name('reservation.status');
    Route::post('reservation/delete{id}', [ReservationController::class, 'destroy'])->name('reservation.destroy');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
