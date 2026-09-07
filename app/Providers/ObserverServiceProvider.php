<?php

namespace App\Providers;

use App\Models\Admin\Catalog;
use App\Models\Public\Client;
use App\Models\Public\Rent;
use App\Models\System\Extend;
use App\Models\System\Package;
use App\Observers\GlobalObserver;
use Illuminate\Support\ServiceProvider;

class ObserverServiceProvider extends ServiceProvider
{

    protected $observers = [
        GlobalObserver::class => [
            Catalog::class,Client::class, Rent::class, Extend::class,Package::class
        ]
    ];


    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
        foreach($this->observers as $obs=>$model)
        array_map(fn($e)=>$e::observe($obs),$model);
    }
}
