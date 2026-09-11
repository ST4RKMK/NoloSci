<?php

namespace App\Services;

use App\Models\Admin\Catalog;
use App\Models\System\MultiMorph;
use App\Models\System\Package;
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



        if($this->model instanceof Model){
            $this->bindingData($cp);
        }


        return $cp;
    }

    private function bindingData(&$cp){
       $mdl = $this->model->toArray();
//       dump($cp);
       foreach ($cp as $k=>$v){
           if(isset($mdl[$k]))
               $cp[$k]['value'] = $mdl[$k];
       }
//       dd($cp);
    }

    private function recursiveArr(&$arr){
        if(is_array($arr))
            if(Arr::isAssoc($arr))
                if(isset($arr['fn']))
                    foreach($arr['fn'] as $key=>$e)
                       call_user_func_array([$this,$e],[&$arr]);
        if (!is_array($arr)) {
            return;
        }
        foreach($arr as $k=>$v)
            if(is_array($v))
                $this->recursiveArr($arr[$k]);

    }

    private function getChildren(Model $model, $rel='from',$to='toable'){
//        $array =[];

        return $model->$rel->map(function($e) use($to){
            $e->$to;
            $local=$e;
            $local->instance_of=get_class($e->$to);
            $local->match=$local->instance_of.'::'.$local->$to->id;
            return $local;

        });

//        dd($model->from);
//        foreach ($model->$method as $child) {
//            array_push($array, $child->toable_type::find($child->toable_id));
//        }
//        return $array;

    }



    /****************************** UTL SRV ******************************/

    private function _findOtherType(&$arr){
        $arr['items']=$this->model->newQuery()->select('type')->distinct()->get()->pluck('type');

    }

    private function _resolveProducts(&$arr){
//        $arr['items']=
        $cat = Catalog::get()->map(fn($e)=>['instance_of'=>Catalog::class,'id'=>$e->id,
            'match'=>Catalog::class.'::'.$e->id,'name'=>$e->name,'items'=>$e->extend->meta]);
        $pack = Package::get()->map(fn($e)=>['instance_of'=>Package::class,'id'=>$e->id,
            'match'=>Package::class.'::'.$e->id,'name'=>$e->name]);
        $merged = $cat->merge($pack);
//        dd($cat,$pack);
        $arr['items']=$merged;
        $arr['type']='custom-package';
        $arr['value']= $this->getChildren($this->model); //MultiMorph::query()->where('multi_morphs.toable_id', '=',$this->model->id);




    }
}
