<?php

namespace App\Http\Controllers;

use App\Models\Admin\Catalog;
use App\Models\Public\Rent;
use App\Services\BuildRules;
use App\Services\FormService;
use Illuminate\Http\Request;

class RentController extends Controller
{
    public function index(){

    }

    public function create(Request $request){
//
        return view('appl.catalog.create',['data'=>FormService::getInstance('app_settings.'.Rent::class,new Rent())->setForm()]);
    }

    public function store(Request $request){
        $validate = $this->validateExtendRules($request, null);
        dd($validate);
    }
}
