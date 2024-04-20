<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMerchant;
use App\Models\Merchant;
use App\Models\MerchantCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class MerchantController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
    public function store(StoreMerchant $request)
    {
        $validated = $request->validated();
        $merchant = new Merchant();
        $merchant->id=$request->id;
        $merchant->business_name=$validated['business_name'];
        $merchant->country_id=$validated['country_id'];
        $merchant->city=$validated['city'];
        $merchant->address=$validated['address'];
        $merchant->zipcode=$validated['zipcode'];
        $merchant->first_name=$validated['first_name'];
        $merchant->last_name=$validated['last_name'];
        $merchant->email=$validated['email'];
        $merchant->country_code=$validated['country_code'];
        $merchant->phone_number=$validated['phone_number'];
        $merchant->merchant_sub_category_id=$validated['merchant_sub_category_id'];
        if($validated['hear_about_us'] == 'Others'){
            $request->validate([
                'others' => 'required|string|max:255',
            ]);
            $merchant->hear_about_us=$request->others;
        }
        else{
            $merchant->hear_about_us=$validated['hear_about_us'];
        }

        $checkEmailM=Merchant::where('email',$merchant->email)->first();
        $checkEmailU=User::where('email',$merchant->email)->first();
        if($checkEmailM || $checkEmailU){
            return Redirect::back()->withErrors('this email is already existed.');
        }
        
        $checkNbrM=Merchant::where('phone_number',$merchant->phone_number)->where('country_code',$merchant->country_code)->first();
        $checkNbrU=User::where('phone_number',$merchant->phone_number)->where('country_code',$merchant->country_code)->first();
        if($checkNbrM || $checkNbrU){
            return Redirect::back()->withErrors('this phone number is already existed.');
        }
        else{
            $merchant->save();
            return Redirect::back()->with('message','Submitted !');
        }
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
