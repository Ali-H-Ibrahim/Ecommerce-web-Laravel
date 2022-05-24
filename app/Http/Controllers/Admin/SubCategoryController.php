<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubCategoryRequests;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\SubCategory;

class SubCategoryController extends Controller
{
    //Checked//
    public function index(){

        $subCategorys= SubCategory::with("categories")->get();
        return view('admin.subCategory.index',compact('subCategorys'));
    }

    //Checked//
    public function create(){
        $categories= Category::get();
        return view('admin.subCategory.create',compact('categories'));
    }

    //Checked//
    public function store(SubCategoryRequests $request){
        $subCategory= SubCategory::create([
            'name'=>$request->name,
            'category_id'=>$request->category_id,
            'status'=>$request -> status,
        ]);
        //return redirect()->back()->with('success','Sub-Category added successfully');
        if($subCategory)
            return response()->json([
                'status'=>true,
                'msg'=>"Category added successfully",
            ]);
        else
            return response()->json([
                'status'=>false,
                'msg'=>"error",
            ]);
    }

    //Checked//
    public function edit($id){
        $categorys= Category::get();
        $subCategory=SubCategory::find($id);
        if(!$subCategory){

            return redirect()->back()->with('error','Sub-category does not exist');
        }
        $subCategory= SubCategory::select('id','name','status')->find($id);
        return view('admin.subCategory.edit',compact('subCategory'),compact('categorys'));

    }

    //Checked//
    public function update(SubCategoryRequests $request, $id){

        $subCategory=SubCategory::find($id);
        if(!$subCategory){

            return redirect()->back()->with('error','Sub-category does not exist');
        }

        $subCategory->update([
            'name'=>$request->name,
            'category_id'=>$request->category_id,
            'status' => $request ->status
        ]);
        $products = $subCategory -> products() -> get();
        foreach($products as $product){
            $product -> update(['status' => $subCategory -> status]);
        }

        $subCategory= SubCategory::select('id','name','status')->get();
        return redirect()-> route('view.subCategory',compact('subCategory'))->with('update','Sub-category updated successfully');
    }

    //Checked//
    public function delete(Request $request){
        $id=$request->id;
        $subCategory=SubCategory::find($id);
        if(!$subCategory){

            return redirect()->back()->with('error','Sub-category does not exist');
        }

        //$subCategory->products()->delete();
        $subCategory->delete();

       // return redirect()->back()->with('delete','Sub-category and all related products deleted successfully');
        return response()->json([
            'status'=>true,
            'msg'=>"SubCategory delete successfully",
            'id'=>$id,
        ]);
    }

    //Checked//
    public function show($id){
        $subCategory=SubCategory::find($id);
        if(!$subCategory){

            return redirect()->back()->with('error','Sub-category does not exist');
        }
        $subCategory=SubCategory::with('products')->find($id);
        $products=$subCategory->products;
        return view('admin.subCategory.show',compact('products'));

    }

}
