<?php

namespace App\Console\Commands;

use App\Models\System\MultiMorph;
use App\Models\System\Package;
use App\Services\PackagePrice;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;

#[Signature('app:check-package-status')]
#[Description('Command description')]
class CheckPackageStatus extends Command
{
    /**
     * Execute the console command.
     */
    public function handle()
    {

        Package::withStatused()->withTrashed()->get()->map(function($e){
            if($e->from->count()===0){
                $e->delete();
            }
            if($e->deleted_at){

                MultiMorph::where('fromable_id',$e->id)
                    ->where('fromable_type',Package::class)
                    ->delete();
                MultiMorph::where('toable_id',$e->id)
                    ->where('toable_type',Package::class)->delete();
            }

        });


        Package::with(['to','from','extend'])->get()->map(function($e){
            $e->updateQuietly(['price'=>PackagePrice::getInstance($e)->__boot__()]);
            $enter_recalc=false;
            if($e->active){
                if($e->available_from>$e->available_to)
                    $enter_recalc=true;
               if(!now()->between($e->available_from,$e->available_to)){
//                   $e->updateQuietly(['status'=>false]);
                   //dispatch evento di ricalcolo pacchetti
                   $enter_recalc=true;
               }
            }else{
                $enter_recalc=true;
//                $e->updateQuietly(['status'=>false]);
                //dispatch evento di ricalcolo pacchetti
            }
            $parents = $e?->from;
            if( $parents){
                $parents->map(function($parent){
                    if($parent->fromable->discount){
                        $prezzolo =  PackagePrice::getInstance($parent->fromable)->__boot__();
                        $parent->fromable->updateQUietly(['price'=>$prezzolo-round(($prezzolo*$parent->fromable->discount)/100)]);
                    }
                });

            }
            if($enter_recalc){


                $e->from?->map(fn($e)=>$e->delete());
                $e->to?->map(fn($e)=>$e->delete());
                $e->extend?->delete();
                $e->updateQuietly(['status'=>false]);
                if($parents)
                $parents?->each(function($parent){

                    try{
                        if( $parent->fromable){
                            if($parent->fromable->discount){
                               $prezzolo =  PackagePrice::getInstance($parent->fromable)->__boot__();
                               $parent->fromable->updateQUietly(['price'=>$prezzolo*($parent->fromable->discount/100)]);
                            }
                        }

                    }catch(\Exception $e){
                        dd($e->getMessage(),$parent->fromable);
                    }
                });
            }
        });


    }
}
