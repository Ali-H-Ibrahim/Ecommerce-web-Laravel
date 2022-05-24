<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Http\Requests\BrandRequest;
use App\Models\Brand;
use App\Traits\ecommereTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Null_;

class BrandsController extends Controller
{       use ecommereTrait;


    public function index(){
        $brands= Brand::select('id','name','logo','description','image')->get();
        return view('admin.brand.index',compact('brands'));
    }

    public function create(){

        return view('admin.brand.create');
    }

    public function store(Request $request){

        try {
            DB::beginTransaction();
            $file_name_logo=null;
            if ($request->has('logo'))
                $file_name_logo=$this->saveImage($request->logo,'images/brands/logo');

            $file_extra_photo=null;
            if ($request->has('image'))
                $file_extra_photo=$this->saveImage($request->image,'images/brands/photo');


            $brand= Brand::create([
                'name'=> $request -> name,
                'logo'=>$file_name_logo,
                'image' => $file_extra_photo,
                'description' => $request -> description,
            ]);

            DB::commit();

            if($brand)
                return response()->json([
                    'status'=>true,
                    'msg'=>"Brand added successfully",
                ]);
            else
                return response()->json([
                    'status'=>false,
                    'msg'=>"error",
                ]);

        }catch (\Exception $exception){
            DB::rollback();
            return redirect()->back()->with('error', 'An error occured, try again');
        }
    }

    public function edit($id){
        $brand=Brand::find($id);
        if(!$brand){
            return redirect()->back()->with('error','Brand does not exist');
        }

        $brand= $brand::select('id','name')->find($id);
        return view('admin.brand.edit',compact('brand'));
    }

    public function update(Request $request, $id){
        try {
        $brand=Brand::find($id);
        if(!$brand){
            return redirect()->back()->with('error','Brand does not exist');
        }
            $file_name_logo=null;
            if ($request->has('logo'))
                $file_name_logo=$this->saveImage($request->logo,'images/brands/logo');

            $file_extra_photo=null;
            if ($request->has('image'))
                $file_extra_photo=$this->saveImage($request->image,'images/brands/photo');

    

            DB::beginTransaction();
            $brand->update([
                'name'=> $request -> name,
                'logo'=>$file_name_logo,
                'image' => $file_extra_photo,
                'description' => $request -> description,
        ]);


        DB::commit();

        $brand= Brand::select('id','name','logo','descritpion','image')->get();
        return redirect()-> route('view.brands',compact('brand'))->with('success','Brand updated successfully');

        }catch (\Exception $exception){
            DB::rollback();
            return redirect()->back()->with('error', 'An error occured, try again');
        }
    }

    public function delete($id){
        $brand=Brand::find($id);
        if(!$brand){
            return redirect()->back()->with('error','Brand does not exist');
        }

        $brand->delete();

        return redirect()->back()->with('success','Brand and all related products deleted successfully');
    }

    public function show($id){
        $brand=Brand::find($id);
        if(!$brand){
            return redirect()->back()->with('error','Brand does not exist');
        }
        $brand=Brand::with('products')->find($id);
        $products=$brand->products;
        return view('admin.brand.show',compact('products'));

    }
}
