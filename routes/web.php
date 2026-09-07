<?php

use App\Http\Controllers\CatalogController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RentController;
use Illuminate\Support\Facades\Route;

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
    $admin=[\App\Models\Admin\Catalog::class => CatalogController::class,
        \App\Models\Public\Client::class => ClientController::class,
        \App\Models\System\Package::class => PackageController::class];
    Route::middleware([])->prefix('admin')->group(function () use ($admin) {
        Route::resources(array_combine(array_map(fn($e)=>strtolower(class_basename($e)),array_keys($admin)),array_values($admin)));
    });

});

require __DIR__.'/auth.php';


$user=[  \App\Models\Public\Rent::class => RentController::class,];
Route::resources(array_combine(array_map(fn($e)=>strtolower(class_basename($e)),array_keys($user)),array_values($user)));
