<?php

namespace App\Observers\Core;

use App\Models\System\MultiMorph;
use App\Models\System\Package;
use App\Services\PackagePrice;

class PackageObserver
{
    //

    public function creating(Package $package): void{
        if($package->discout)
            $package->price=PackagePrice::getInstance($package)->__boot__()*($package->discout/100);
    }


    public function updating(Package $package): void{

        if($package->discount)
            $package->price=PackagePrice::getInstance($package)->__boot__()/($package->discount/100);
    }

    public function deleted(Package $package): void{

        $package->from->map(fn($e)=>$e->delete());
        MultiMorph::where('toable_id',$package->id)
            ->where('toable_type',Package::class)->delete();

    }

}
