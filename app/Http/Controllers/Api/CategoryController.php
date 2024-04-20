<?php

namespace App\Http\Controllers\Api;

use App\Models\MerchantCategory;
use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Merchant;
use App\Models\MerchantSubCategory;
use App\Models\Offer;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function filter(Request $request)
    {
        $id = $request->id;

        $offers = Offer::whereHas("product1",function ($e) use ($id){
            $e->where("products.id","=",$id);
        })->with("product1")->with("product2")->get();

        $products = Product::where("product_category_id","=",$id)->get();

        return [
            "offers"=> $offers,
            "products" => $products
        ];
    }

    public function MerchantCategory()
    {
        $response = [
            'merchant category'=> $this->getMerchantCategory(),
        ];
        return response($response , 201);
    }

    public static function getMerchantCategory()
    {
        $categories = MerchantCategory::all();
        for($i = 0; $i < count($categories); $i++){
            $categories[$i]['image'] = env('APP_URL') . "/public/images/category/" . $categories[$i]->image;
        }
        return $categories;
    }

    public function MerchantSubCategory($id)
    {
        $topPicks = MerchantSubCategory::where("category_id",$id)->where("count",">",0)->orderBy('count', 'desc')->take(6)->get();
        for($i = 0; $i < count($topPicks); $i++){
            $topPicks[$i]->image = env('APP_URL') . "/public/images/category/" . $topPicks[$i]->image;
        }

        $subCategories = MerchantSubCategory::where("category_id","=",$id)->get();
        for($i = 0; $i < count($subCategories); $i++){
            $subCategories[$i]->image = env('APP_URL') . "/public/images/category/" . $subCategories[$i]->image;
        }
        $response = [
            'top picks'=> $topPicks,
            'all sub categories'=> $subCategories
        ];
        return response($response , 201);
    }

    public function ProductCategory()
    {
        return response(['product category'=>$this->getProductCategory()] , 201);
    }

    public static function getProductCategory()
    {
        $categories = ProductCategory::all();

        for($i = 0; $i < count($categories); $i++){
            $categories[$i]->image = env('APP_URL') . "/public/images/category/" . $categories[$i]->image;
        }
        return $categories;
    }

    public function getMerchantsOfSubCategory(Request $request,$id)
    {
        $subCat= MerchantSubCategory::find($id);
        $subCat->count = $subCat->count + 1;
        $subCat->save();
        $merchants = Merchant::where("merchant_sub_category_id","=",$id)->get();
        foreach($merchants as $merchant){
            $branches = Branch::where("merchant_id","=",$merchant->id)->get();
            foreach($branches as $branch){
                $dis = MerchantController::merchantDistance($branch , $request);
                if($dis<1)
                {
                    $dis = (int)($dis * 1000);
                    $merchant['distance'] = $dis ." m";
                }
                else
                {
                    $merchant['distance'] = $dis ." km";
                }
            }
        }
        return response(['merchants'=>$merchants] , 201);
    }
}
