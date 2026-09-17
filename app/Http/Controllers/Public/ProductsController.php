<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Http\Resources\Frontend\PackageResource;
use App\Http\Resources\Frontend\ProductResource;
use App\Models\Admin\Catalog;
use App\Models\System\Package;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    //

    public function showAllProducts(Request $request){


      $ar =PackageResource::collection(Package::all())->merge(ProductResource::collection(Catalog::all()));

      return view('public.prd-pck',['data'=>$ar]);

//        return view('public.products-manager',
//            ['data'=>Package::where('available_from','<=',now())->where('available_to','>',now())->get()]);

    }


}
