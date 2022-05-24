<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Images;
use App\Traits\ecommereTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SliderController extends Controller
{
    use ecommereTrait;

    public function create()
    {

        $images = Images::where('product_id', 0)->get(['img']);
        return view('admin.slider.images.create', compact('images'));
    }

    public function saveImagesInDirectory(Request $request)
    {

        $file = $request->file('dzfile');
        $file_name = $this->saveImage($file, 'images/slider');

        return response()->json([
            'name' => $file_name,
            'original_name' => $file->getClientOriginalName()
        ]);
    }

    public function saveImagesDb(Request $request)
    {
        try {
            // $product_id = $request->id;
            $images = [];
            foreach ($request->document as $docu) {
                $images[] = [
                    'product_id' => 0,
                    'img' => $docu,
                ];
            }

            // save Images
            DB::beginTransaction();

            Images::insert($images);

            DB::commit();

            return redirect()->route('view.products')->with('update', 'Product updated successfully');

        } catch (\Exception $exception) {
            DB::rollback();
            return redirect()->back()->with('error', 'error');
        }

    }


    public function removeImageInDirectory(Request $request)
    {

        $this->deletImage("images\slider\\", $request->name);

        return response()->json([
            'status' => true,
            'msg' => "Category delete successfully",
        ]);
    }
}
