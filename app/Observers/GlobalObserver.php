<?php

namespace App\Observers;

use Illuminate\Support\Str;

class GlobalObserver
{
    //

    public function creating (Model $model){
        if(null===$model->uuid)
            $model->uuid=Str::uuid();
    }
}
