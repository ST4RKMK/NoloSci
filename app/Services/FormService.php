<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class FormService
{

    private Model|null $model;
    private $config;
    /**
     * Create a new class instance.
     */
    public function __construct($config='app_settings',Model|null $model)
    {
        //
        $this->config = config($config);
        $this->model = $model;
    }

    public static function getInstance($config='app_settings',Model|null $model){
        return new self($config,$model);
    }

    public function setForm(){
        $cp = $this->config;
        $this->recursiveArr($cp);
        return $cp;
    }


    private function recursiveArr(&$arr){
        if(is_array($arr))
            if(Arr::isAssoc($arr))
                if(isset($arr['fn']))
                    foreach($arr['fn'] as $key=>$e)
                       call_user_func_array([$this,$e],[&$arr]);
        foreach($arr as $k=>$v)
            if(is_array($v))
                $this->recursiveArr($arr[$k]);

    }



    /****************************** UTL SRV ******************************/

    private function _findOtherType(&$arr){
        $arr['items']=$this->model->newQuery()->select('type')->distinct()->get()->pluck('type');

    }
}
