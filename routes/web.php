<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use function Pest\Laravel\get;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('admin/dashboard',function(){
    return  view("admin.dashboard");
}

)->middleware(['auth','role:Admin'])->name('admin.dashboard');

Route::get('seller/dashboard', function(){
    return view('seller.dashboard');
})->middleware(['auth','role:Seller'])->name('seller.dashboard');

Route::get('customer/dashoard',function(){
    return view('storefront');
})->middleware(['auth','role:Customer'])->name('storefront');

require __DIR__.'/auth.php';
