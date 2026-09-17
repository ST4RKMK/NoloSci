<?php

use App\Http\Controllers\CatalogController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Public\ProductsController;
use App\Http\Controllers\RentController;
use App\Models\Admin\Catalog;
use App\Models\System\Package;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.public');
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
        Route::resources(array_combine(array_map(fn($e)=>strtolower(class_basename($e)),array_keys($admin)),array_values($admin))
//            ,['as'=>'index.store.create'] <- QUESTO É ESEMPIO CON PREFISSO
        );
    });

});

require __DIR__.'/auth.php';


$user=[  \App\Models\Public\Rent::class => RentController::class,];
Route::resources(array_combine(array_map(fn($e)=>strtolower(class_basename($e)),array_keys($user)),array_values($user)));

Route::get('/packages', function () {

//    $data = Package::with(['from.toable' => fn(MorphTo $mdl) => $mdl->morphWith([Package::class =>['from.toable'],Catalog::class =>[]])])->where('available_from','<',now())->where('available_to','>',now())->get();
//    $data = Package::with(['extend','from.toable.extend'])->where('available_from','<',now())->where('available_to','>',now())->get()->toArray();

//
//});
    $packages = Package::with(['extend','from:id,fromable_id,fromable_type,toable_id,toable_type',
        'from.toable' => fn (MorphTo $m) => $m->constrain([
            Package::class => fn ($q) => $q->select('id', 'name')->with('extend'),
            Catalog::class => fn ($q) => $q->select('id', 'name', 'price')->with('extend'),
        ]),
    ])->where('available_from', '<', now())->where('available_to', '>', now())->get();

    $products = Catalog::with('extend')->where('available_from', '<', now())->where('available_to', '>', now())->get();

    return view('public.pack-and-prod-selection',['packages' => $packages,'products' => $products]);
});

//
//
Route::get('/products',[ProductsController::class,'showAllProducts'])->name('public.products');
//    $data = Catalog::with('extend')->where('available_from', '<', now())->where('available_to', '>', now())->get();
//return view('public.products',['data'=>$data]);





