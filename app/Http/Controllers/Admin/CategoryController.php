<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //Checked//
    public function index(){
        $categories= Category::select('id','name','status')->get();
        return view('admin.category.index',compact('categories'));
    }

    //Checked//
    public function create(){
        return view('admin.category.create');
    }

    //Checked//
    public function store(CategoryRequest $request){

      $category=  Category::create([
            'name'=>$request->name,
            'status'=>$request->status
        ]);
        //return redirect()->back()->with('success','Category added successfully');
        if($category)
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
        $category=Category::find($id);
        if(!$category){

            return redirect()->back()->with('error','Category does not exist');
        }
        $category= Category::select('id','name','status')->find($id);
        return view('admin.category.edit',compact('category'));
    }

    //Checked//
    public function update(CategoryRequest $request, $id){
        $category=Category::find($id);
        if(!$category){
            return redirect()->back()->with('error','Category does not exist');
        }

        $category->update([
            'name'=>$request->name,
            'status'=>$request ->status,
        ]);

        $subcategories = $category -> subCategories() -> get();
        foreach($subcategories as $subcategory){
            $subcategory->update(['status'=> $category -> status]);
            $products = $subcategory -> products() -> get();
            foreach($products as $product){
                $product -> update(['status' => $category -> status]);
            }
        }

        $category= Category::select('id','name','status')->get();
        return redirect()-> route('view.category',compact('category'))->with('update','Category updated successfully');
    }

    //Checked//
    public function delete(Request $request){
        $id=$request->id;
        $category=Category::find($id);
        if(!$category){
            return redirect()->back()->with('error','Category does not exist');
        }

//
//        $category->products()->delete();
//        $category->subCategories()->delete();
        $category->delete();

        //return redirect()->back()->with('delete','Category and all related sub-categories,products deleted successfully');
        return response()->json([
            'status'=>true,
            'msg'=>"Category delete successfully",
            'id'=>$id,
        ]);
    }

    //Checked//
    public function show($id){
        $category=Category::find($id);
        if(!$category){
            return redirect()->back()->with('error','Category does not exist');
        }
        $category=Category::with('subCategories')->find($id);
        $subCategorys=$category->subCategories;
        return view('admin.category.show',compact('subCategorys'));

    }

}
