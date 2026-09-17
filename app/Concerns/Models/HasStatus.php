<?php

namespace App\Concerns\Models;

use Illuminate\Database\Eloquent\Builder;

trait HasStatus
{
    //

    public static function bootHasStatus(){
        static::addGlobalScope('isStatus',function(Builder $builder){
           $builder->where('status',true);
        });
    }

    public function scopeWithStatused(Builder $builder){
        return $builder->withoutGlobalScope('isStatus');
    }
    public function scopeOnlyStatus(Builder $builder){
        return $builder->withoutGlobalScope('isStatus')
            ->where('status',false)->where('status',true);
    }
}
