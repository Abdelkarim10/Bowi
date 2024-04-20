<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Merchant;
use App\Models\Offer;
use App\Models\User;
use App\Models\UserOffer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserOfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offers = Offer::all();
        $mytime = Carbon::now()->toDateTimeString();
        return view('admin_dashboard.offers.index', [
            'offers' => $offers,
            'useroffertime' =>  $mytime

        ]);
    }



    public function userOffers($offer_id)
    {
        
        
       
        $useroffers = UserOffer::where("offer_id", $offer_id)->get();
        return view('admin_dashboard.users-offers.index', [
            'usersoffers' => $useroffers,
            "offer" => Offer::find($offer_id),
     
         
        ]);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function redeemCodePage()
    {
        $merchant = Auth::user()->merchant;
        $userOffers = [];
        
        return view('admin_dashboard.merchants.redeem_code.index', [
            'userOffers' => $userOffers,
        ]);
    }
    
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
