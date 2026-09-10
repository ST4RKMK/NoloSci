<?php

namespace App\Services\Database;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Schema;

class HlpService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public static function intersectColumns(Model|string $model,$data=[]){
        $tbl = $model instanceof Model ? $model->getTable() : $model;

        return Arr::only( $data,Schema::getColumnListing($tbl));
    }


}
