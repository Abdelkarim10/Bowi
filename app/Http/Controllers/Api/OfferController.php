<?php

namespace App\Http\Controllers\Api;

use App\Models\UserOffer;
use App\Http\Controllers\Controller;
use App\Models\Merchant;
use App\Models\Offer;
use App\Models\OfferType;
use App\Models\Product;
use App\Models\SavedOffer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

// use Illuminate\Support\Facades\DB;

class OfferController extends Controller
{
    public function ListOfUsedOffers()
    {
        $user = Auth::user();
        $usedOffers = UserOffer::select(
            DB::raw('YEAR(created_at) year, MONTH(created_at) month, SUM(saving) savings')
            )->where('user_id', $user->id)->groupBy("year", "month")->paginate(10);

            // $offers = UserOffer::where



            foreach(array_values($usedOffers->toArray())[1] as $usedOffer){
                $usedOffer['offers'] = UserOffer::where('user_id', $user->id)->whereMonth('created_at', $usedOffer['month'])->whereYear('created_at', $usedOffer['year'])->with("offer")->get();
            }

            return $usedOffers;

        foreach ($usedOffers as $usedOffer) {
            $usedOff = UserOffer::where('user_id', $user->id)->whereMonth('created_at', $usedOffer->month)->whereYear('created_at', $usedOffer->year)->get();
            $usedOffer['usedOffers'] = $usedOff;
            foreach ($usedOffer['usedOffers'] as $usedOff) {
                $offer = Offer::findOrFail($usedOff->offer_id);
                $merchant = Merchant::findOrFail($offer->merchant_id);
                $usedOff['offer'] = $offer;
                $usedOff['merchant'] = $merchant;
            }
        }
        return response([
            "usedOffer"=> $usedOffers,
            "currency" => $user->country->currency,
        ],201);
    }

    public function SaveOffer(Request $request)
    {
        $userId = Auth::user()->id;
        $offerId = $request->offer_id;
        $savedOffer = SavedOffer::where('user_id',$userId)->where('offer_id',$offerId)->first();
        if($savedOffer){
            return response([
                "message" => "Offer already saved"
            ],201);
        }
        else{
            $savedOffer = new SavedOffer();
            $savedOffer->user_id = $userId;
            $savedOffer->offer_id = $offerId;
            $savedOffer->save();
            return response([
                "savedOffer" => $savedOffer,
                "message" => "Offer saved successfully"
            ],201);
        }
    }

    public function ListOfSavedOffers($id)
    {
        return response([
            'ListOfSavedOffers'=>$this->getListOfSavedOffers($id),
            'currency'=> Auth::user()->country->currency
        ],201);
    }

    public function RemoveFromSavedOffers(Request $request)
    {
        $userId = Auth::user()->id;
        $offerId = $request->offer_id;
        $savedOffer = SavedOffer::where('user_id',$userId)->where('offer_id',$offerId)->first();
        if($savedOffer){
            $savedOffer->delete();
            return response([
                "message" => "Offer removed successfully"
            ],201);
        }
        else{
            return response([
                "message" => "Offer not found"
            ],201);
        }
    }

    public static function getListOfSavedOffers($id)
    {
        $ListOfSavedOffers = SavedOffer::where('user_id',$id)->with("offer")->get();
        if(count($ListOfSavedOffers) == 0)
        return [];

        $myListOfSavedOffers = $ListOfSavedOffers->map(function($offer){
            $offer->offer->merchant = Merchant::findOrFail($offer->offer->merchant_id);
            $offer->offer->product1 = Product::findOrFail($offer->offer->product1_id);
            if($offer->offer->product2_id){
                $offer->offer->product2 = Product::findOrFail($offer->offer->product2_id);
            }
            $offer->offer->type = OfferType::findOrFail($offer->offer->type_id);
            return $offer;
        });

        return $myListOfSavedOffers;
    }

    public static function getIdsOfSavedOffers($id)
    {
        $ListOfSavedOffers = SavedOffer::select('offer_id')->where('user_id',$id)->get();

        return $ListOfSavedOffers;
    }

    public function savings()
    {
        $user = Auth::user();
        return response( [
            'savings'=> $this->getSavings($user),
        ],200);
    }
    public static function getSavings($user)
    {
        $i = 1;
        $averageOfUser = 0;
        $averageOfOtherUsers = 0;

        $UOThisMonth = UserOffer::where('user_id',$user->id)->whereMonth('created_at', Carbon::now()->month);
        $sections['savingsThisMonth'] = $UOThisMonth->sum('saving');
        $sections['nbOfOffersThisMonth'] = $UOThisMonth->count();

        $UOAllTimes = UserOffer::where('user_id',$user->id);
        $sections['totalAllSavings'] = $UOAllTimes->sum('saving');
        $sections['nbOfAllOffers'] = $UOAllTimes->count();

        $UserOffers = UserOffer::select('id AS UserOfferId')->where('user_id',$user->id)->limit(6)->get();

        foreach ($UserOffers as $UserOffer) {
            $UserOffer['UserSavings'] = (int)((UserOffer::where('user_id',$user->id)->whereMonth('created_at', Carbon::now()->month-$i)->avg('saving')));
            $otherSavings = (int)(UserOffer::where('user_id','!=',$user->id)->whereMonth('created_at', Carbon::now()->month-$i)->avg('saving'));
            $UserOffer['UserSavingsPercentage'] = $otherSavings == 0 ? 100 : (int)(($UserOffer['UserSavings'] / $otherSavings) * 100);
            $UserOffer['month'] =  Carbon::now()->month-$i;

            $averageOfOtherUsers = $averageOfOtherUsers + $otherSavings;

            $i++;
            if($i>6){
                break;
            }
        }
        $sections['months'] = $UserOffers;

        $sections['averageOfOtherUsers'] = (int)($averageOfOtherUsers/6);

        $sections['currency'] = $user->country->currency;

        return $sections;
    }

    public function generatePinForOffer(Request $request)
    {
        $userId = Auth::user()->id;
        $offerId = $request->offer_id;
        $product1_id = Offer::find($offerId)->product1_id;
        $product2_id = Offer::find($offerId)->product2_id;

        $isOfferTaken = UserOffer::where('user_id',$userId)->where('offer_id',$offerId)->where('expire_date','>',now())->first();

        if(Auth::user()->plan != null){
            if($isOfferTaken == null){
                if($product2_id != null){
                    $saving = Product::find($product2_id)->price;
                }
                else if($product2_id == null){
                    $saving = Product::find($product1_id)->price * (100 - Offer::find($offerId)->discount)/100;
                }
                $userOffer= new UserOffer();
                $userOffer = UserOffer::create([
                    'user_id' => $userId,
                    'offer_id' => $offerId,
                    'saving' => $saving,
                    'code'=> date("d", strtotime("today")).strtoupper (Str::random(6)).(UserOffer::count()+1),
                    'expire_date'=> Carbon::now()->endOfMonth(),
                ]);
                return response(['user_offer' => $userOffer],201);
            }
            else{
                return response([
                    'message' => 'Offer already taken',
                    'user_offer' => $isOfferTaken
                ],201);
            }
        }
        else{
            return response([
                'message' => ['You are not subscribed to any of our plans.']
            ], 404);
        }
    }
}
