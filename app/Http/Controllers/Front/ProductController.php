<?php


namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Images;
use App\Models\Brand;
use App\Models\Review;

class ProductController extends Controller{

    ########## Start Show Product ##########
        public function previewProduct($id){
            
            $product = Product::find($id);
            $Similar_Product = $product->subCategories->products;

            $reviews = Review::with('user')->where('product_id', $product->id)->get();
            if (!$product) {
                return redirect()->route('main_page')->with('error', 'Product does not exist');
            }
            return view('front.mainPages.product', compact('product', 'reviews'), compact('Similar_Product'));
        }
    ########## End Show Product ##########


    ########## Start Categories Search & Filtering ##########
        public function showProductSubCategory($id){

            $subCategory = SubCategory::with('categories')->find($id);
            if(!$subCategory){
                return redirect()->back()->with('error','Category does not exist');
            }
            $category = Category::find($subCategory -> category_id);
            $subCategories = $category -> subCategories;
            $products = $subCategory -> products -> where('status','On') ;
            $productsIds = collect([]);
            foreach ($products as $product){
                $productsIds -> push($product -> id);
            }
            $brands = Brand::get()->sortBy('name');
            return view('front.mainPages.ProductViewPages.subCategory-results', compact('category','subCategory','subCategories','products','brands','productsIds'));
        }

        public function filterProductSubCategory(Request $request){
            ########## Sub-Category Filter ##########
            $filterSubCategory = $request -> subcategory;
            if($filterSubCategory){
                $products = Product::where('status','On') -> whereIn('SubCategory_id', $filterSubCategory) -> get(); 
                    
                ########## Price Filter ##########
                $filterMinPrice = $request -> minPrice;
                $filterMaxPrice = $request -> maxPrice;
                if(isset($filterMinPrice) && isset($filterMaxPrice)){
                    $products = $products -> whereBetween('price', [$filterMinPrice, $filterMaxPrice]);
                }
                ########## Brand Filter ##########
                $filterBrand = $request -> brand;
                if($filterBrand){
                    $products = $products -> whereIn('brand_id',$filterBrand);
                }

                ########## Sort By ##########
                $sortMethod = $request -> sortBy;
                if($sortMethod){
                    if ($sortMethod == "Highest Price"){
                        $products = $products -> sortByDesc('price');
                    }

                    else if ($sortMethod == "Lowest Price"){
                        $products = $products -> sortBy('price');
                    }

                    else if ($sortMethod == "Name Ascending"){
                        $products = $products -> sortBy('name');
                    }

                    else if ($sortMethod == "Name Descending"){
                        $products = $products -> sortByDesc('name');
                    }

                    else if ($sortMethod == "Most Recent"){
                        $products = $products -> sortByDesc('created_at');
                    }
                }
                ########## Return Data ##########
                response()->json($products); 
                return view('front.mainPages.ProductViewPages.products-view', compact('products'));
            }

             ########## My Products ##########
             $productsIds = $request -> products;
             $products = Product::where('status','On') -> whereIn('id', $productsIds) -> get();
             ########## Price Filter ##########
            $filterMinPrice = $request -> minPrice;
            $filterMaxPrice = $request -> maxPrice;
            if(isset($filterMinPrice) && isset($filterMaxPrice)){
                $products = $products -> whereBetween('price', [$filterMinPrice, $filterMaxPrice]);
            }
            ########## Brand Filter ##########
            $filterBrand = $request -> brand;
            if($filterBrand){
                $products = $products -> whereIn('brand_id',$filterBrand);
            }

            ########## Sort By ##########
            $sortMethod = $request -> sortBy;
            if($sortMethod){
                if ($sortMethod == "Highest Price"){
                    $products = $products -> sortByDesc('price');
                }

                else if ($sortMethod == "Lowest Price"){
                    $products = $products -> sortBy('price');
                }

                else if ($sortMethod == "Name Ascending"){
                    $products = $products -> sortBy('name');
                }

                else if ($sortMethod == "Name Descending"){
                    $products = $products -> sortByDesc('name');
                }

                else if ($sortMethod == "Most Recent"){
                    $products = $products -> sortByDesc('created_at');
                }
            }
            ########## Return Data ##########
            response()->json($products); 
            return view('front.mainPages.ProductViewPages.products-view', compact('products'));
            
        }
    ########## End Categories Search & Filtering ##########


    ########## Start Search Results Search & Filtering ##########
        public function showSearchResults($item){
            
            $title = 'لايوجد شيء مطابق';

            $products = Product::where('name', $item) 
                                ->where('status','On')
                                ->orWhere('name', 'LIKE', '%' . $item . '%') -> get();

            if ($products -> count() > 0)
                $title = 'Search';



            // $query = $request->input('search_entry');
            // $products = Product::search($query)->where('status','On')->get();
            $productsIds = collect([]);
            foreach ($products as $product){
                $productsIds -> push($product -> id);
            }
            $categories = Category::get()->sortBy('name');
            $brands = Brand::get()->sortBy('name');
            return view('front.mainPages.ProductViewPages.search-results',compact('products','categories','brands','productsIds','title'));

            // return view('front.mainPages.search', compact('subCategory', 'title'));
        }
        
        public function filterSearchResults(Request $request){
            
            ########## My Products ##########
            $productsIds = $request -> products;
            $products = Product::where('status','On') -> whereIn('id', $productsIds) -> get(); 

            
            ########## Price Filter ##########
            $filterMinPrice = $request -> minPrice;
            $filterMaxPrice = $request -> maxPrice;
            if(isset($filterMinPrice) && isset($filterMaxPrice)){
                $products = $products -> whereBetween('price', [$filterMinPrice, $filterMaxPrice]);
            }
            ########## Category Filter ##########
            $filterCategory = $request -> category;
            if($filterCategory){
                $subCat = SubCategory::whereIn('category_id',$filterCategory) -> get();
                $subCategories = collect([]);
                foreach ($subCat as $subCategory){
                    $subCategories ->push($subCategory -> id);
                }
                $products = $products -> whereIn('SubCategory_id', $subCategories);
            }
            
            
            
            ########## Brand Filter ##########
            $filterBrand = $request -> brand;
            if($filterBrand){
                $products = $products -> whereIn('brand_id',$filterBrand);
            }

            ########## Sort By ##########
            $sortMethod = $request -> sortBy;
            if($sortMethod){
                if ($sortMethod == "Highest Price"){
                    $products = $products -> sortByDesc('price');
                }

                else if ($sortMethod == "Lowest Price"){
                    $products = $products -> sortBy('price');
                }

                else if ($sortMethod == "Name Ascending"){
                    $products = $products -> sortBy('name');
                }

                else if ($sortMethod == "Name Descending"){
                    $products = $products -> sortByDesc('name');
                }

                else if ($sortMethod == "Most Recent"){
                    $products = $products -> sortByDesc('created_at');
                }
            }


            ########## Return Data ##########
            response()->json($products); 
            return view('front.mainPages.ProductViewPages.products-view', compact('products'));
        }
    ########## End Search Results Search & Filtering ##########


    ########## Start Brand Search & Filtering ##########
        public function showProductsBrand($id){

            $brand = Brand::find($id);
            if(!$brand){
                return redirect()->back()->with('error','Brand does not exist');
            }
            $categories = Category::get();
            $products = Product::where('status','On') -> where('brand_id', $id) -> get();
            $productsIds = collect([]);
            foreach ($products as $product){
                $productsIds -> push($product -> id);
            }
            return view('front.mainPages..ProductViewPages.brand', compact('brand','categories','products','productsIds'));


        }

        public function filterBrandResults(Request $request){
            
            ########## My Products ##########
            $productsIds = $request -> products;
            $products = Product::where('status','On') -> whereIn('id', $productsIds) -> get(); 

            ########## Category Filter ##########
            $filterCategory = $request -> category;
            if($filterCategory){
                $subCat = SubCategory::where('category_id',$filterCategory) -> get();
                $subCategories = collect([]);
                foreach ($subCat as $subCategory){
                    $subCategories ->push($subCategory -> id);
                }
                $products = $products -> whereIn('SubCategory_id', $subCategories);
            }

            ########## Return Data ##########
            response()->json($products); 
            return view('front.mainPages.ProductViewPages.products-view', compact('products'));
            
            
        }
    ########## End Brand Search & Filtering ##########

    
}