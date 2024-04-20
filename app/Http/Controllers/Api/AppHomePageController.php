<?php

namespace App\Http\Controllers\Api;

use App\Models\HomeSection;
use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Country;
use App\Models\Merchant;
use App\Models\Offer;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppHomePageController extends Controller
{
    public function sections(Request $request)
    {
        $user = Auth::user();
        return response([
            'home sections'=>$this->getHomeSections($user, $request),
            'merchant category'=> CategoryController::getMerchantCategory(),
            'ListOfSavedOffers'=> OfferController::getListOfSavedOffers($user->id),
            'savings'=> OfferController::getSavings($user),
            'currency'=> $user->country->currency,
        ],200);
    }

    public function guestSections(Request $request)
    {
        return response([
            'home sections'=>$this->getGuestHomeSections($request),
            'merchant category'=> CategoryController::getMerchantCategory(),
            'currency'=> Country::find(1)->currency,
        ],200);
    }

    public static function getHomeSections(User $user, Request $request){
        $sections = HomeSection::orderBy('position')->get();

        foreach ($sections as $section) {
            if ($section->type == "ad") {

                if($section->merchant_id != null){
                    $merch = Merchant::findOrFail($section->merchant_id);

                    if($merch->country_id != $user->country_id){
                        //remove section from array
                        $sections = $sections->where('id', '!=', $section->id);
                    }
                    else{
                        $branches = Branch::where("merchant_id","=",$merch->id)->get();
                        $section['merchant ad'] = $merch;
                        $closest = array();
                        foreach($branches as $branch){
                            $dis = MerchantController::merchantDistance($branch , $request);
                            array_push($closest , $dis );
                        }
                        $dis = min($closest);
                        if($dis<1)
                        {
                            $dis = (int)($dis * 1000);
                            $dis = $dis ." m";
                        }
                        else
                        {
                            $dis = (int)($dis) ." km";
                        }
                        $section['merchant ad']['distance'] = $dis;
                    }
                } elseif($section->offer_id != null){
                    $off = Offer::findOrFail($section->offer_id)->with('product1')->with('product2')->with('type')->first();
                    if($off->merchants->country_id != $user->country_id){
                        //remove section from array
                        $sections = $sections->where('id', '!=', $section->id);
                    } else{
                    $section['offer ad'] = $off;
                    $section['currency'] = $user->country->currency;
                    }
                }
                $section['image'] = env('APP_URL')."/public/storage/".$section->image;
            }
            if($section->type == 'offers'){
                $section['offers'] = Offer::whereHas("merchants",function($q) use ($user){
                    $q->where("country_id",$user->country_id)->where("activated",1)->where("accepted",1);
                })->limit(3)->where('type_id',$section->offer_type_id)->with('product1')->with('product2')->with("type")->with("merchants")->get();
                $section['currency'] = $user->country->currency;
            }
            if($section->type == 'merchants'){
                $merch = Merchant::where("country_id",$user->country_id)->where("merchant_sub_category_id",$section->merchant_sub_category_id)->where("activated",1)->where("accepted",1)->get();
                foreach ($merch as $m) {
                    $branches = Branch::where("merchant_id","=",$m->id)->get();
                    $closest = array();
                    foreach($branches as $branch){
                        $dis = MerchantController::merchantDistance($branch , $request);
                        array_push($closest , $dis );
                    }
                    $dis = min($closest);
                    if($dis<1)
                    {
                        $dis = (int)($dis * 1000);
                        $dis = $dis ." m";
                    }
                    else
                    {
                        $dis = (int)($dis) ." km";
                    }
                    $m['distance'] = $dis;
                }

                $section['merchants'] = array_slice(array_values($merch->sort(function($a, $b) {
                    return $a['distance'] <=> $b['distance'];
                })->toArray()),0,3);
            }
            if($section->type == 'collaboration'){
                $section['merchant'] = Merchant::where('id', $section->merchant_id)->where("country_id",$user->country_id)->where("activated",1)->where("accepted",1)->first();
                if($section['merchant'] != null){
                    $section['merchant offers'] = Offer::where('merchant_id', $section->merchant_id)->with(["product1" => function ($query) {$query->select('*');}])->with(["product2" => function ($query) {$query->select('*');}])->with('type')->get();
                    $section['currency'] = $user->country->currency;
                }
                else{
                    //remove section from array
                    $sections = $sections->where('id', '!=', $section->id);
                }
            }
        }
        return $sections;
    }

    public static function getGuestHomeSections(Request $request){
        $sections = HomeSection::orderBy('position')->get();

        foreach ($sections as $section) {
            if ($section->type == "ad") {

                if($section->merchant_id != null){
                    $merch = Merchant::findOrFail($section->merchant_id);
                    $branches = Branch::where("merchant_id","=",$merch->id)->get();
                    $section['merchant ad'] = $merch;
                    $closest = array();
                    foreach($branches as $branch){
                        $dis = MerchantController::merchantDistance($branch , $request);
                        array_push($closest , $dis );
                    }
                    $dis = min($closest);
                    if($dis<1)
                    {
                        $dis = (int)($dis * 1000);
                        $dis = $dis ." m";
                    }
                    else
                    {
                        $dis = (int)($dis) ." km";
                    }
                    $section['merchant ad']['distance'] = $dis;
                }
                elseif($section->offer_id != null){
                    $off = Offer::findOrFail($section->offer_id)->with('product1')->with('product2')->with('type')->first();
                    $section['offer ad'] = $off;
                    $section['currency'] = Country::find(1)->currency;
                }
            }
            if($section->type == 'offers'){
                $section['offers'] = Offer::whereHas("merchants",function($q){
                    $q->where("activated",1)->where("accepted",1);
                })->limit(3)->where('type_id',$section->offer_type_id)->with('product1')->with('product2')->with("type")->with("merchants")->get();
                $section['currency'] = Country::find(1)->currency;
            }
            if($section->type == 'merchants'){
                $merch = Merchant::where("merchant_sub_category_id",$section->merchant_sub_category_id)->where("activated",1)->where("accepted",1)->get();
                foreach ($merch as $m) {
                    $branches = Branch::where("merchant_id","=",$m->id)->get();
                    $closest = array();
                    foreach($branches as $branch){
                        $dis = MerchantController::merchantDistance($branch , $request);
                        array_push($closest , $dis );
                    }
                    $dis = min($closest);
                    if($dis<1)
                    {
                        $dis = (int)($dis * 1000);
                        $dis = $dis ." m";
                    }
                    else
                    {
                        $dis = (int)($dis) ." km";
                    }
                    $m['distance'] = $dis;
                }

                $section['merchants'] = array_slice(array_values($merch->sort(function($a, $b) {
                    return $a['distance'] <=> $b['distance'];
                })->toArray()),0,3);
            }
            if($section->type == 'collaboration'){
                $section['merchant'] = Merchant::where('id', $section->merchant_id)->where("activated",1)->where("accepted",1)->first();
                if($section['merchant'] != null){
                    $section['merchant offers'] = Offer::where('merchant_id', $section->merchant_id)->with(["product1" => function ($query) {$query->select('*');}])->with(["product2" => function ($query) {$query->select('*');}])->with('type')->get();
                    $section['currency'] = Country::find(1)->currency;
                }
                else{
                    //remove section from array
                    $sections = $sections->where('id', '!=', $section->id);
                }
            }
        }
        return $sections;
    }
}
