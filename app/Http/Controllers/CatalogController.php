<?php

namespace App\Http\Controllers;

use App\Models\Admin\Catalog;
use App\Models\Public\Rent;
use App\Services\BuildRules;
use App\Services\Database\HlpService;
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

        return view('appl.components.tables.table',[
            'headers'=>['#'=>'id','Nome'=>'name','action'=>'action'],
            'buttons'=>[
                [
                    'type'=>'edit',
                    'route'=>'catalog.edit',
                    'parameters'=>['catalog'=>'id'],
                    'label'=>'Modifica'
                ],
                [
                    'type'=>'delete',
                    'route'=>'catalog.destroy',
                    'parameters'=>['catalog'=>'id'],
                    'label'=>'Elimina'
                ],

            ],
            'data'=>Catalog::all()->toArray(),
            'footerButton'=>[
                'createButton'=>
                [
                    'type'=>'create',
                    'route'=>'catalog.create',
                    'parameters'=>null,
                    'label'=>'Crea'
                ],
            ]

        ]);

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
        if(!$validate->fails()){

            $catalog = new Catalog();
            $catalog = $catalog->create(HlpService::intersectColumns($catalog, $request->all()));
            $this->insertExtend($request, $catalog);

        }else{
            return redirect()->back()->withErrors($validate);
        }


        return redirect()->route('catalog.index');

    }

    public function edit(Request $request, Catalog $catalog)
    {

        $ct = $catalog->toArray();

        $this->mergeData(['data' => FormService::getInstance('app_settings.' . Catalog::class, $catalog)->setForm(),
            'model'=>$catalog]);
        return view('appl.catalog.create', $this->_response);




    }

    public function update(Request $request, Catalog $catalog){
        $validate = $this->validateExtendRules($request);
        if(!$validate->fails()){
            $catalog->update(HlpService::intersectColumns($catalog, $request->all()));
            $this->insertExtend($request, $catalog);
        }else{

        }

        return redirect()->route('catalog.index');

    }

    public function destroy(Request $request, Catalog $catalog){
        $catalog->delete();
        return redirect()->route('catalog.index');
    }
}
