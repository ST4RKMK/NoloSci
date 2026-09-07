<?php

namespace App\Concerns\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

trait CheckExtend
{
    public function checkExtend(Request $richiesta, Model|null $modello ){
        $data = Arr::dot($richiesta->all());
//        $extend = Arr::where($data, fn ($e,$k) => str_contains($k, 'extend'));
        $extend = [];
        Arr::map($data, function ($value, $key) use (&$extend) {
            if (str_contains($key, 'extend')) {

                $extend [str_replace('_','.',$key)] = $value;
//                return true;
            }

        });
        return Arr::undot($extend);
//        dd($extend);
    }

    //
}
