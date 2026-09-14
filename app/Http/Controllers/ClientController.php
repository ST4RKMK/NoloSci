<?php

namespace App\Http\Controllers;

use App\Models\Public\Client;
use App\Models\Public\Rent;
use App\Services\FormService;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        $this->mergeData(['dataC'=>FormService::getInstance('app_settings.'.Client::class,new Client())->setForm(),
//            'dataR'=>FormService::getInstance('app_settings.'.Rent::class,new Rent())->setForm()
        ]);

        return view('appl.client.create',$this->_response);

    }
}
