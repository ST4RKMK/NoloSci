<?php

namespace App\Http\Controllers;

use App\Models\Admin\Catalog;
use App\Services\BuildRules;
use App\Services\FormService;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;


class CatalogController extends Controller
{
    //

    public function index(Request $request){
        dd($request->all());
    }

    public function create(Request $request){

//        return FormService::getInstance('app_settings.'.Catalog::class,new Catalog())->setForm();

        return view('appl.catalog.create',['data'=> FormService::getInstance('app_settings.'.Catalog::class,new Catalog())->setForm()]);
    }

    public function store(Request $request)
    {
        $extend = $this->checkExtend($request, null);

        $request->request->add($extend);


        $rules = BuildRules::getIstance()->buildRules('app_settings.'.Catalog::class,['extend_meta'=>'extend.meta.*']);

//        dd($rules);


        $validate = Validator::make($request->all(),$rules);
        if ($validate->fails()) {
            dd($validate);
        }
        dd($validate);

        dd(Arr::dot($request->all()), $extend);

    }
}
