<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Attribute;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Images;
use App\Models\Product;
use App\Models\ProductsAttribute;
use App\Models\SubCategory;
use App\Models\SystemNotification;
use App\Models\UserSystemNotification;
use App\Models\Wanted;
use App\Traits\ecommereTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    use ecommereTrait;

    //Checked//
    public function index()
    {
        $products = Product::with('subCategories')->get();
        $attributes = Attribute::get();
        return view('admin.product.index', compact('products', 'attributes'));
    }

    //Checked ((Major Changes Must See))//
    public function create()
    {
        $Categories = Category::get();
        $subCategories = SubCategory::with('categories')->get();
        $brands = Brand::get();
        return view('admin.product.create', compact('subCategories', 'brands', 'Categories'));
    }

    //Checked (( Major Changes + Added Status Must See))//
    public function store(ProductRequest $request)
    {

        try {
            DB::beginTransaction();
            $file_name_main_img = $this->saveImage($request->main_img, 'images/Product/main_photo');
            $product = Product::create([
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'SubCategory_id' => $request->SubCategory_id,
                'brand_id' => $request->brand_id,
                'status' => $request->status,
                'code' => "",
                'sale_counts' => 0,
                'rate_counts' => 0,
                'main_img' => $file_name_main_img,
                'featured' => 0,
                'quantity' => $request->quantity,
                'made_in' => '',

            ]);

            DB::commit();

            /***    new *****/

            if (true) {

                if (true) {

                    //  $wanteds = Wanted::where('product_id', $product->id)->get();

                    //return $product->users;'{{ route('preview.product', $product -> id) }}'"

                    $textMsg =   " <a  href=" . route('preview.product', $product->id) . '> <li class="starbucks "><div class="notify_icon">  <span class="icon"> <img src= '. asset("images/Product/main_photo/" . $product -> main_img). ' alt=""> </span> </div> <div class="notify_data"> <div class="title"> <h3>'. $product->brands->name  .'  العلامة التجارية '. '</h3>  توفر منتج جديد </div> <div class="sub_title "> '. $request->name .' </div> </div> <div class="notify_status"> <p>29/3/2021</p> </div> </li>'. "</a>" ;

                    //  return $textMsg;

                    $id_product = $product->id;

                    $SystemNot = SystemNotification::create([
                        'messages' => $textMsg,
                    ]);


                    $id_SystemNot = $SystemNot->id;
                    $Not = [];

                    if ($product->brands->users) {
                        foreach ($product->brands->users as $wanted) {


                            $Not[] = [
                                'user_id' => $wanted->id,
                                'notification_id' => $id_SystemNot,
                                'new' => 1
                            ];

                            // نعبي جدول الاشعارات للشخص المطوب
                        }


                        DB::beginTransaction();
                        UserSystemNotification::insert($Not);
                        DB::commit();

                    }
                }
            }







            //return redirect()->back()->with('success', 'Product added successfully');
            if ($product)
                return response()->json([
                    'status' => true,
                    'msg' => " added successfully",
                ]);
            else
                return response()->json([
                    'status' => false,
                    'msg' => "error",
                ]);

        } catch (\Exception $exception) {
            DB::rollback();
            return redirect()->back()->with('error', 'An error occured, try again');
        }
    }

    //Checked//
    public function edit($id)
    {
        $subCategories = SubCategory::with('categories')->get();
        $brands = Brand::get();
        $product = Product::find($id);
        if (!$product) {

            return redirect()->back()->with('error', 'Product does not exist');
        }
        $product = Product::select('id', 'name', 'price', 'description', 'quantity', 'status', 'main_img')->find($id);
        return view('admin.product.edit', compact('product', 'subCategories', 'brands'));
    }

    //Checked (( Major Changes + Added Status Must See))//
    public function update(Request $request, $id)
    {

        $product = Product::find($id);
        if (!$product) {
            return redirect()->back()->with('error', 'Product does not exist');
        }


        /***** new ******/
        if($product->quantity)
            $subject='  نعلمكم عن توفر المنتج ';

        $subject='نعلمكن عن وجود عرض ';
        /***********c*******/

        try {
            DB::beginTransaction();

            if ($request->has('main_img')) {
                $this->deletImage("images\Product\main_photo\\", $product->main_img);
                $file_name_main_img = $this->saveImage($request->main_img, 'images/Product/main_photo');
                $product->update([
                    'main_img' => $file_name_main_img,
                ]);
            }
            $product->update([
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'SubCategory_id' => $request->SubCategory_id,
                'brand_id' => $request->brand_id,
                'status' => $request->status,
                'code' => "",
                'sale_counts' => 0,
                'rate_counts' => 0,
                'featured' => 0,
                'quantity' => $request->quantity,
                'made_in' => '',
            ]);

            DB::commit();


            if (true) {

                if (true) {

                    $wanteds = Wanted::where('product_id', $id)->get();


                    //return $product->users;'{{ route('preview.product', $product -> id) }}'"

                    $textMsg = ". نعلمكم عن توفر المنتج $request->name <a  href=" . route('preview.product', $id) . ">Show</a>";
                    $textMsg =   " <a  href=" . route('preview.product', $id) . '> <li class="starbucks "><div class="notify_icon">  <span class="icon"> <img src= '. asset("images/Product/main_photo/" . $product -> main_img). ' alt=""> </span> </div> <div class="notify_data"> <div class="title"> '. ' نعلمكم عن توفر المنتج' .' </div> <div class="sub_title "> '. $request->name .' </div> </div> <div class="notify_status"> <p>29/3/2021</p> </div> </li>'. "</a>" ;








                    //  return $textMsg;

                    $id_product = $id;

                    $SystemNot = SystemNotification::create([
                        'messages' => $textMsg,
                    ]);


                    $id_SystemNot = $SystemNot->id;
                    $Not = [];

                    if ($product->users) {
                        foreach ($product->users as $wanted) {


                            $Not[] = [
                                'user_id' => $wanted->id,
                                'notification_id' => $id_SystemNot,
                                'new' => 1
                            ];

                            // نعبي جدول الاشعارات للشخص المطوب
                        }


                        DB::beginTransaction();
                        UserSystemNotification::insert($Not);
                        DB::commit();

                    }
                }
            }

            return redirect()->route('view.products')->with('update', 'Product updated successfully');

        } catch (\Exception $exception) {
            DB::rollback();
            return redirect()->back()->with('error', 'error');
        }

    }

    //Checked//
    public function delete($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return redirect()->back()->with('error', 'Product does not exist');
        }

        $product->delete();
        return redirect()->back()->with('delete', 'Product deleted successfully');
    }

    public function show($id)
    {

        $product = Product::find($id);

        if (!$product) {
            return redirect()->back()->with('error', 'Product does not exist');
        }

        return view('admin.product.show', compact('product'));


    }

    public function show_SubCategory(Request $request)
    {

        $category = Category::with('subCategories')->find($request->id);
        if ($category) {


            $subCategories = [];
            foreach ($category->subCategories as $subCateg) {
                $subCategories[] = [
                    'id' => $subCateg->id,
                    'name' => $subCateg->name,

                ];
            }

            return response()->json([
                'status' => true,
                'data' => $subCategories
            ]);
        } else
            return response()->json([
                'status' => false,
                'msg' => "error",
            ]);


    }

    public function addImages($id)
    {
        $images = '';
        $product = Product::find($id);
        if ($product) {
            $images = $product->images;
        }


        return view('admin.product.images.create', compact('images'))->withId($id);

    }

    public function saveProductImagesInDirectory(Request $request)
    {

        $file = $request->file('dzfile');
        $file_name = $this->saveImage($file, 'images/Product/images_Product');

        return response()->json([
            'name' => $file_name,
            'original_name' => $file->getClientOriginalName()
        ]);


    }

    public function saveProductImagesDb(Request $request)
    {

        try {
            $product_id = $request->id;
            $images = [];
            foreach ($request->document as $docu) {
                $images[] = [
                    'product_id' => $product_id,
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

        $this->deletImage("images\Product\images_Product\\", $request->name);

        return response()->json([
            'status' => true,
            'msg' => "Category delete successfully",
        ]);
    }

    public function removeImageDb(Request $request)
    {

        $this->deletImage("images\Product\images_Product\\", $request->name);
        $id = $request->id;

        $images = Images::find($id);

        if ($images) {
            $images->delete();

            return response()->json([
                'status' => true,
                'msg' => "Category delete successfully",
                'id' => $id,

            ]);
        }
    }

    ########## Begin Products Attributes ##########
    public function createAttribute($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return redirect()->back()->with('error', 'Product does not exist');
        }
        $attributes = Attribute::get();
        return view('admin.product.attributes.create', compact('product', 'attributes'));
    }

    public function storeAttribute(Request $request)
    {

        $productsAttribute = ProductsAttribute::create([
            'product_id' => $request->id,
            'attribute_id' => $request->attribute_id,
            'value' => $request->value,
            'price' => $request->price,
            'quantity' => $request->quantity,
        ]);

        return redirect()->route('show.products.attribute',  $request->id)->with('success', 'Products attributes has been added successfully');
    }

    public function editAttribute($id)
    {
        $productAttribute = ProductsAttribute::find($id);

        if (!$productAttribute) {
            return redirect()->back()->with('error', 'Products attribute does not exist');
        }
        $attributes = Attribute::get();
        return view('admin.product.attributes.edit', compact('productAttribute', 'attributes'));
    }

    public function updateAttribute(Request $request, $id, $p_id)
    {
        $productAttribute = ProductsAttribute::find($id);
        if (!$productAttribute) {
            return redirect()->back()->with('error', 'Products attribute does not exist');
        }
        $productAttribute->update([
            'product_id' => $p_id,
            'attribute_id' => $request->attribute_id,
            'value' => $request->value
        ]);
        return redirect()->route('show.products.attribute', $p_id)->with('update', 'Products attribute updated successfully');
    }

    public function deleteAttribute($id)
    {
        $productAttribute = ProductsAttribute::find($id);
        if (!$productAttribute) {
            return redirect()->back()->with('error', 'Products attribute does not exist');
        }
        $productAttribute->delete();
        return redirect()->back()->with('delete', 'products attribute deleted successfully');
    }

    public function showAttributes($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return redirect()->back()->with('error', 'Product does not exist');
        }
        $product = Product::with("attributes")->find($id);
        $productsAttributes = ProductsAttribute::where('product_id', $id)->get();
        return view('admin.product.attributes.index', compact('product', 'productsAttributes'));
    }
    ########## End Products Attributes ##########

}
