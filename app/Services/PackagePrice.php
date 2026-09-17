<?php

namespace App\Services;

use App\Models\System\Package;

class PackagePrice
{

    public Package $package;


    public $price=0;

    /**
     * Create a new class instance.
     */
    public function __construct(Package $package)
    {
        //
        $this->package = $package;
    }

    public static function getInstance(Package $package): PackagePrice{
        return new self($package);
    }

    public function __boot__(){

        foreach($this->package->from as $item)
            $this->haveRecursiveIterator($item);


        return $this->price;
    }

    public function haveRecursiveIterator($to){
        if($to->toable instanceof Package)
            $this->price += PackagePrice::getInstance($to->toable)->__boot__();
        else{
            try{
                $this->price += $to->toable->price;
            }catch (\Exception $e){

            }
        }
    }

}
