<?php

namespace App\Http\Controllers;

use App\Concerns\Models\CheckExtend;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

abstract class Controller
{

    use CheckExtend;

    public $_route=[];

    public $_response=[];

    private const IGNORED_VERBS = ['HEAD', 'OPTIONS'];
    private const NATIVE_VERB = ['GET', 'POST'];
    public function __construct(){
        $this->subRoutes();
    }

    protected array $formActions = [
        'create' => 'store',
        'edit'   => 'update',
    ];

    private function primaryVerb($route){
        $verbs = array_diff($route->methods(), self::IGNORED_VERBS);
        $write = array_diff($verbs,['GET']);

        if (in_array('PUT',$verbs,true)){
            return 'PUT';
        }

        return reset($write) ?: (reset($verbs) ?: 'POST');
    }



    public function subRoutes(){
        $name = request()->route()?->getName();

        if (! $name || ! str_contains($name, '.')) {
            return null; //se la rotta non ha il putno
        }

        $target = $this->formActions[Str::afterLast($name, '.')] ?? null;

        if (! $target) { //nessuna form da andare (index e show)
            return null;
        }

        $mdl = Str::beforeLast($name, '.');
        $route = Route::getRoutes()->getByName("$mdl.$target");

        if (! $route) { //non esiste in formactions
            return null;
        }


        $verb = $this->primaryVerb($route);

        $method = (in_array($verb,self::NATIVE_VERB,true)) ? $verb : 'POST';
        $hidden = (in_array($verb,self::NATIVE_VERB,true)) ? null : $verb;

        $this->_route = ['route' =>$route,'method' => $method,'hidden' => $hidden];

//        list($mdl,$act) = explode('.',request()->route()->getName());
//        $act=match(true){
//            $act==='edit'=>'update',
//            default=>'store'
//        };
//        $routes=Route::getRoutes()->getRoutes();
//        $this->_route=  ['route'=>collect(
//            Route::getRoutes()->getRoutes())->map(fn($e)=>Str::containsAll($e->getName(),[$mdl,$act])?$e:null)->filter()?->first()];
    }


    public function mergeData($data){
        $this_response= $this->_route+=$data;
    }
}

