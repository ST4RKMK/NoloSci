<?php

namespace App\Http\Controllers;

use App\Models\Admin\Catalog;
use App\Models\Public\Rent;
use App\Models\System\Package;
use App\Services\BuildRules;
use App\Services\FormService;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class RentController extends Controller
{
    public function index(){

    }

    public function create()
    {
//
    }

    public function store(Request $request){
        $validate = $this->validateExtendRules($request, null);
        dd($validate);
    }
}
