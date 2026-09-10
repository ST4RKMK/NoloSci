<?php

namespace App\Http\Controllers;

use App\Models\Admin\Catalog;
use App\Models\Public\Rent;
use App\Services\BuildRules;
use App\Services\FormService;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class CatalogController extends Controller
{
    //


    public function index(Request $request)
    {
        $name = request()->route()?->getName();
        dd(Route::getRoutes()->getRoutes(), $name);

        dd($request->all(),);
    }

    public function create(Request $request)
    {

        $this->mergeData(['data' => FormService::getInstance('app_settings.' . Catalog::class, new Catalog())->setForm()]);
//        dd($this->_response);
        return view('appl.catalog.create', $this->_response);
    }

    public function store(Request $request)
    {
        $validate = $this->validateExtendRules($request, null);
        dd($validate);

    }

    public function edit(Request $request, Catalog $catalog)
    {
        dd($catalog);

//        $this->subRoutes();
//        dd($this->_route);

    }
//        $formActions = [
//            'create' => 'store',
//            'edit'   => 'update',
//        ];
//
//        $name = request()->route()?->getName();
//        $mdl  = Str::beforeLast($name, '.');
//        $act  = Str::afterLast($name, '.');
//
//        $target = $formActions[$act] ?? null;
//
//        dd($name, $act, $mdl, $target, Route::getRoutes()->getByName("$mdl.$target"));
//    }
}
