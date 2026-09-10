<?php

namespace App\Http\Controllers;

use App\Models\System\Package;
use App\Services\Database\HlpService;
use App\Services\FormService;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function create(){

        $this->mergeData(['data'=>FormService::getInstance('app_settings.'.Package::class,new Package())->setForm()]);


        return view('appl.package.create',$this->_response);
    }


    public function store(Request $request){
        $ext = $this->checkExtend($request,null,'multi_morph',false);
        $pack = new Package();
        $pack->fill(HlpService::intersectColumns($pack,$request->all()));
        $pack=$pack->save();
        if(!empty($ext)){
            foreach($ext as $e){
                list($mdl,$id)=explode('::',$e);
            $pack->from()->create([
                'toable_type'=>$mdl,
                'toable_id'=>$id,
            ]);

            }
        }
        dd($pack,$request->all(),$ext);
    }
}
