<?php

namespace App\Http\Controllers;

use App\Models\System\Package;
use App\Services\FormService;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function create(){

        $this->mergeData(['data'=>FormService::getInstance('app_settings.'.Package::class,new Package())->setForm()]);

        dd($this->_response);

        return view('appl.package.create',$this->_response);
    }
}
