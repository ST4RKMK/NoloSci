<?php

namespace App\Services;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class BuildRules
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {

    }

    public static function getIstance(){
        return new self();
    }

    public function grepRulesFromConfig($config){
        $cnf = Arr::dot(config($config));
        $rules = Arr::where($cnf, function ($value, $key) {
            return str_contains($key, 'rules');
        });
//        dd($rules);
        return $rules;


    }

    public function buildRules($config,$replace,$delete = ['.rules'=>'']){
        $replace += $delete;
        $keys = array_keys($replace);
        $values = array_values($replace);
        $rules = $this->grepRulesFromConfig($config);
//        dump($rules);
        foreach($rules as $key=>$value){
            if (Str::contains($key, $keys)) {
                $rules[str_replace($keys,$values,$key)] = $value;
                unset($rules[$key]);
            }


        }
//        dd($rules);
        return $rules;

    }
}
