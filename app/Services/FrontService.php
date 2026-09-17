<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;

class FrontService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function makeTable(Model $model){

        $namemodel = 'qualcosa';



        return [
            'headers' => ['#'=>'id','Nome'=>'name','action'=>'action'],
            'buttons' => [],
            'data' => $model->toArray(),
        ];

    }
}
