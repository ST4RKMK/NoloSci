<?php

namespace App\Http\Controllers;

use App\Models\System\Package;
use App\Services\Database\HlpService;
use App\Services\FormService;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Redirect;

class PackageController extends Controller
{

    public function index()
    {

        return view('appl.components.tables.table',[
            'headers' => ['#'=>'id','Nome'=>'name','action'=>'action'],
            'buttons' => [
                [
                    'type'=>'edit',
                    'route'=>'package.edit',
                    'parameters'=>['package'=>'id'],
                    'label'=>'Modifica'
                ],
                [
                    'type'=>'delete',
                    'route'=>'package.destroy',
                    'parameters'=>['package'=>'id'],
                    'label'=>'Elimina'
                ],
            ],
            'data' => Package::all()->toArray(),
            'footerButton'=>[
                'createButton' => [
                    'type'=>'create',
                    'route'=>'package.create',
                    'parameter'=>null,
                    'label'=>'Crea Pacchetto'
                ]
            ]
        ]);

    }

    public function create(){

        $this->mergeData(['data'=>FormService::getInstance('app_settings.'.Package::class,new Package())->setForm()]);


        return view('appl.package.create',$this->_response);
    }


    public function store(Request $request){
        $pack = $this->checkExtend($request,null,'multi_morph',false, new Package());
//        $pack = new Package();
//        $pack->fill(HlpService::intersectColumns($pack,$request->all()));
//        dd($request->all(),$ext,array_column($ext['multi_morph'],'toable'));
//        $pack->save();

//        if(!empty($ext)){
//            $ext = array_column($ext['multi_morph'],'toable');
//
//            foreach($ext as $e){
////                foreach ($e as $i) {
////                    dd($i);
//                    list($mdl, $id) = explode('::', $e);
//                    $pack->from()->create([
//                        'toable_type' => $mdl,
//                        'toable_id' => $id,
//                    ]);
////                }
//
//            }
//        }
//        dd($pack,$request->all(),$ext);
        return redirect()->route('package.index');
    }

    public function edit(Request $request,Package $package)
    {
        $this->mergeData(['data'=>FormService::getInstance('app_settings.'.Package::class,$package)->setForm(),'model'=>$package]);
        return view('appl.package.create',$this->_response);
    }

    public function delete(Request $request, Package $package){
        $package->delete();
        return redirect()->route('package.index');

    }

    public function update(Request $request,Package $package){
        $pack = $this->checkExtend($request,null,'multi_morph',false, $package);
//        dd("Controller ---> ", $pack);
        $validate = $this->validateExtendRules($request);
        if(!$validate->fails()){
            $pack->update(HlpService::intersectColumns($pack,$request->all()));
            $this->insertExtend($request,$pack);
        }else{
            return Redirect::back()->withErrors($validate);
        }

        return redirect()->route('package.index');

    }




}
