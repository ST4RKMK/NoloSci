<?php

namespace App\Providers;

use App\Models\Admin\Catalog;
use App\Models\System\Package;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        config(['view.compiled'=>false]);
        Blade::directive('checkInstance', function ($e) {
            return "<?php echo match (true){
                $e === \App\Models\System\Package::class=>'Pacchetto',
                $e === \App\Models\Admin\Catalog::class=>'Prodotto',
                default=>'FALSE'
            }; ?>";
        });
    }
}
