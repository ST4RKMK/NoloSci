<?php

namespace App\Concerns\Models;

use App\Models\Admin\Catalog;
use App\Services\BuildRules;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

trait CheckExtend
{


    public function insertExtend(Request $request,Model $model,$type='extend'){
        $ext = $this->checkExtend($request,$model,$type);
        if(!empty($ext))
            !$model->extend?
                 $model->extend()->create($ext[$type]):
                    $model->extend->update($ext[$type]);

    }


    public function checkExtend(Request $richiesta, Model|null $modello,$type='extend',$dotted=true ){
        $data = Arr::dot($richiesta->all());
//        $extend = Arr::where($data, fn ($e,$k) => str_contains($k, 'extend'));
        $extend = [];
        Arr::map($data, function ($value, $key) use (&$extend,$type,$dotted) {
            if (str_contains($key, $type)) {
                if($dotted)
                $extend [str_replace('_','.',$key)] = $value;
//                return true;
                else
                    $extend [$key] = $value;
            }

        });
        return Arr::undot($extend);
//        dd($extend);
    }

    public function validateExtendRules(Request $richiesta, Model|null $model = null){
        $extend = $this->checkExtend($richiesta, $model);

        $richiesta->request->add($extend);

        $rules = BuildRules::getIstance()->buildRules('app_settings.'.Catalog::class,['extend_meta'=>'extend.meta.*']);

        $validate = Validator::make($richiesta->all(), $rules);

        return $validate;
    }

    //
}
