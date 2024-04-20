<?php

namespace App\Http\Controllers\Api;

use App\Models\Merchant;
use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Country;
use App\Models\HomeSection;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MerchantController extends Controller
{
    public function search(Request $request)
    {
        $offersP = Offer::whereHas("product1",function ($e) use ($request){
            if($request->has("name")){
                $e->where("products.name","LIKE","%$request->name%");
            }
            if($request->has("product_category_id")){
                $e->where("products.product_category_id",$request->product_category_id);
            }
            if($request->has("price_from")){
                $e->where("products.price",">",$request->price_from);
            }
            if($request->has("price_to")){
                $e->where("products.price","<",$request->price_to);
            }
        })->with("product1")->with("product2")->with('merchants');

        if($request->has("type_id")){
            $offersP->where("type_id",$request->type_id);
        }
        $offersP = $offersP->get();
        
        $offer = Offer::where("name","LIKE","%$request->name%")
            ->whereHas("product1",function ($e) use ($request){
                if($request->has("product_category_id")){
                    $e->where("products.product_category_id",$request->product_category_id);
                }
                if($request->has("price_from")){
                    $e->where("products.price",">",$request->price_from);
                }
                if($request->has("price_to")){
                    $e->where("products.price","<",$request->price_to);
                }
            })->with("product1")->with("product2")->with('merchants')->get();

        $merchants = Merchant::where("business_name","LIKE","%$request->name%")->get();
        foreach($merchants as $merchant){
            $branches = Branch::where("merchant_id","=",$merchant->id)->get();
            $closest = array();
            foreach($branches as $branch){
                $dis = MerchantController::merchantDistance($branch , $request);
                array_push($closest , $dis );
            }
            $dis = min($closest);
            if($dis<1)
            {
                $dis = $dis * 1000;
                $dis = (int)($dis) ." m";
            }
            else
            {
                $dis = (int)($dis) ." km";
            }
            $merchant['distance'] = $dis;
        }
        $merchants =array_values($merchants->sort(function($a, $b) {
            return $a['distance'] <=> $b['distance'];
        })->toArray());
        
        return response([
            "products"=> $offersP,
            "offers" => $offer,
            "merchants" => $merchants
        ],201);
    }
    
    public function bestMerchants()
    {
        return response(["merchant" => Merchant::where("rate",">=", 4)->with("user")->get()],201) ;
    }

    public function show(Merchant $merchant , Request $request)
    {
        // this api show merchant info & all offers of merchant
        
        $currency = Country::where("id",$merchant->country_id)->first()->currency;

        $branches = Branch::where("merchant_id",$merchant->id)->get();
        $closest = array();
        foreach ($branches as $branch) {
            $dis = $this->merchantDistance($branch , $request);
            array_push($closest , $dis );
            $branch['distance'] = $dis;
            if($branch['distance']<1)
            {
                $branch['distance'] = $branch['distance'] * 1000;
                $branch['distance'] = (int)($branch['distance']) ." m";
            }
            else
            {
                $branch['distance'] = (int)($branch['distance']) ." km";
            }
        }
        $dis = min($closest);
        if($dis<1)
        {
            $dis = $dis * 1000;
            $dis = (int)($dis) ." m";
        }
        else
        {
            $dis = $dis ." km";
        }

        return response(["merchant info" => Merchant::find($merchant->id),
                         "branches" => $branches,
                         "Distance" => $dis,
                         "currency" => $currency,
                         "merchant Offers" =>$merchant->offers()->with("type")->with("product1")->with("product2")->get()],201);
    }

    public static function merchantDistance(Branch $branch , Request $request)
    {
        $sqlDistance = ( 111.045 * acos( cos( deg2rad($branch->latitude ) ) 
       * cos( deg2rad( $request->latitude ) ) 
       * cos( deg2rad( $request->longitude ) 
       - deg2rad( $branch->longitude ) ) 
       + sin( deg2rad( $branch->latitude ) ) 
       * sin( deg2rad( $request->latitude ) ) ) );

       $dis = ($sqlDistance);
        return $dis;
    }

    public function merchantOffers(Merchant $merchant)
    {
        // this api to return all offers of merchant
        return response(["merchant Offers" =>$merchant->offers()->with("type")->with("product1")->with("product2")->get()],201);
    }

    public function MerchantsByClosestDistance(Request $request)
    {
       
        return response(['Merchants By Closest Distance' => $this->getMerchantsByClosestDistance($request)],201);

    }

    public static function getMerchantsByClosestDistance(Request $request)
    {
        $sqlDistance = DB::raw('( 111.045 * acos( cos( radians(' . $request->latitude . ') ) 
        * cos( radians( latitude ) ) 
        * cos( radians( longitude ) 
        - radians(' . $request->longitude . ') ) 
        + sin( radians(' . $request->latitude . ') ) 
        * sin( radians( latitude ) ) ) )');
        $stores =  DB::table('branches')
        ->select('*')
        ->join('merchants', 'merchants.id', '=', 'branches.merchant_id')
        ->selectRaw("{$sqlDistance} AS distance")
        ->orderBy('distance')
        ->get();

        foreach($stores as $store)
        {
            $store->distance = (int)($store->distance);
            $dis = $store->distance ." Km";

            if($store->distance<1)
            {
                $store->distance = (int)($store->distance * 1000);
                $dis = $store->distance ." m";
            }
            $store->distance = $dis;
        }

        return $stores;
    }

}
