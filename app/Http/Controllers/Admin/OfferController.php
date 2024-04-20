<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Merchant;
use App\Models\Offer;
use App\Models\OfferType;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\RequestForEdit;
use App\Models\UserOffer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sales(){
        if(Auth::user()->role_id == 2 || (Auth::user()->role_id == 3 && Session::get('view_as_merchant') == true)){
            return view('admin_dashboard.merchants.sales.index');
        }
    }
    public function index()
    {

        if (Auth::user()->role_id == 2 || (Auth::user()->role_id == 3 && Session::get('view_as_merchant') == true)) {



            $user = Auth::user();

            if($user->role_id == 2)
            {
                $merchant = Merchant::findOrFail($user->merchant->id);
            }
            else
            {
                $merchant = Merchant::findOrFail(Session::get('admin_view_merchant_id'));
            }
            $offers = Offer::where('merchant_id', $merchant->id)->where('expired_date','>',Carbon::now())->paginate(10);
            return view('admin_dashboard.merchants.merchants_offer.index', [
                'offers' => $offers,
                'reqs' => \App\Models\RequestForEdit::select('offer_id')->where('merchant_id',$merchant->id)->get(),
            ]);
        }
        if (Auth::user()->role_id == 3) {
            $offers = Offer::all();

            return view('admin_dashboard.offers.index', [
                'offers' => $offers,
            ]);
        }
    }

    public function oldOffers(){
        if (Auth::user()->role_id == 2 || (Auth::user()->role_id == 3 && Session::get('view_as_merchant') == true)) {
            $user = Auth::user();
            if($user->role_id == 2)
            {
                $merchant = Merchant::findOrFail($user->merchant->id);
            }
            else
            {
                $merchant = Merchant::findOrFail(Session::get('admin_view_merchant_id'));
            }
            $offers = Offer::where('merchant_id', $merchant->id)->where('expired_date','<',Carbon::now())->paginate(10);
            return view('admin_dashboard.merchants.merchants_offer.old_offers', [
                'offers' => $offers,
            ]);
        }
    }


    public function merchantsOffer($merchant_id)
    {
        if((Auth::user()->role_id == 3 && Session::get('view_as_merchant') == true)){
            $merchant_id = Session::get('admin_view_merchant_id');
        }
        $merchant = Merchant::findOrFail($merchant_id);
        $offers = $merchant->offers()->get();
        $user = Auth::user();
        return view('admin_dashboard.offers.index', [
            'merchant' => $merchant,
            'offers' => $offers
        ]);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        if((Auth::user()->role_id == 3 && Session::get('view_as_merchant') == true)){
            $merchant_id = Session::get('admin_view_merchant_id');
        }
        else{
            $merchant_id = Auth::user()->merchant->id;
        }

        return view('admin_dashboard.merchants.merchants_offer.create', [
            "offertypes" => OfferType::all(),

            "products" => Product::where('merchant_id', $merchant_id)->get(),

            "offersCount" => Offer::where('merchant_id', $merchant_id)->where('expired_date','>',Carbon::now())->count(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $offer = new Offer();
        $offer->name = $request->name;
        $offer->picture = $request->picture;
        $offer->type_id = $request->type_id;
        $offer->product1_id = $request->product1_id;
        $offer->product2_id = $request->product2_id;

        if(Auth::user()->role_id == 3 && Session::get('view_as_merchant') == true){
            $merchant_id = Session::get('admin_view_merchant_id');
        }
        else{
            $merchant_id = Auth::user()->merchant->id;
        }
        $offer->merchant_id = $merchant_id;

        $offer->rate = 0;
        $offer->condition = $request->condition;
        $offer->discount = $request->discount;
        $offer->expired_date = Carbon::now()->addYear();
        $offer->estimated_saving = $request->estimated_saving;
        $offer->save();

        if ($request->hasFile('picture')) {

            $image = $request->file('picture');


            $imageName = $offer->id .time() . $offer->name .  '.' . $image->extension();


            $destinationPath = public_path('/assets/offer_pics/');


            $image->move($destinationPath, $imageName);


            $offer->update([
                "picture" => $imageName
            ]);
        }

        if($request->has('type_id1')){
            $offer1 = new Offer();
            $offer1->name = $request->name1;
            $offer1->picture = $request->picture1;
            $offer1->type_id = $request->type_id1;
            $offer1->product1_id = $request->product1_id1;
            $offer1->product2_id = $request->product2_id1;
            $offer1->merchant_id = $merchant_id;
            $offer1->rate = 0;
            $offer1->condition = $request->condition1;
            $offer1->discount = $request->discount1;
            $offer1->expired_date = Carbon::now()->addYear();
            $offer1->estimated_saving = $request->estimated_saving1;
            $offer1->save();
            if ($request->hasFile('picture1')) {

                $image = $request->file('picture1');


                $imageName = $offer1->id .time() . $offer1->name .  '.' . $image->extension();


                $destinationPath = public_path('/assets/offer_pics/');


                $image->move($destinationPath, $imageName);


                $offer1->update([
                    "picture" => $imageName
                ]);
            }

            $offer2 = new Offer();
            $offer2->name = $request->name2;
            $offer2->picture = $request->picture2;
            $offer2->type_id = $request->type_id2;
            $offer2->product1_id = $request->product1_id2;
            $offer2->product2_id = $request->product2_id2;
            $offer2->merchant_id = $merchant_id;
            $offer2->rate = 0;
            $offer2->condition = $request->condition2;
            $offer2->discount = $request->discount2;
            $offer2->expired_date = Carbon::now()->addYear();
            $offer2->estimated_saving = $request->estimated_saving2;
            $offer2->save();
            if ($request->hasFile('picture2')) {

                $image = $request->file('picture2');


                $imageName = $offer2->id .time() . $offer2->name .  '.' . $image->extension();


                $destinationPath = public_path('/assets/offer_pics/');


                $image->move($destinationPath, $imageName);


                $offer2->update([
                    "picture" => $imageName
                ]);
            }
        }

        return redirect('/my-offers')->with('message', 'Offer Added!');

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $offer = Offer::find($id);
        return view('admin_dashboard.merchants.merchants_offer.show', [
            'offer' => $offer,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        if((Auth::user()->role_id == 3 && Session::get('view_as_merchant') == true)){
            $merchant_id = Session::get('admin_view_merchant_id');
        }
        else{
            $merchant_id = Auth::user()->merchant->id;
        }

        $offer = Offer::find($id);
        return view('admin_dashboard.merchants.merchants_offer.edit', [
            'offer' => $offer,
            "products" => Product::where('merchant_id', $merchant_id)->get(),
            "offertypes" => OfferType::all(),
            "productCategorys" => ProductCategory::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $req = RequestForEdit::find($id);
        $offer = Offer::where('id', $req->offer_id)->first();

        if($req->picture != null){
            if ($offer->picture != null) {
                $image_path = 'assets/offer_pics/' .   $offer->picture;

                if (File::exists($image_path)) {
                    File::delete($image_path);
                }
            }
            $offer->update([
                'name' => $req->name,
                'picture' => $req->picture,
                'type_id' => $req->type_id,
                'product1_id' => $req->product1_id,
                'product2_id' => $req->product2_id,
                'merchant_id' => $req->merchant_id,
                'rate' => $req->rate,
                'top_rated' => $req->top_rated,
                'condition' => $req->condition,
                'expired_date' => $req->expired_date,
               'estimated_saving'=> $req->estimated_saving,
                'discount' => $req->discount,
            ]);
        }
        else{
            $offer->update([
                'name' => $req->name,
                'picture' => $offer->picture,
                'type_id' => $req->type_id,
                'product1_id' => $req->product1_id,
                'product2_id' => $req->product2_id,
                'merchant_id' => $req->merchant_id,
                'rate' => $req->rate,
                'top_rated' => $req->top_rated,
                'condition' => $req->condition,
                'expired_date' => $req->expired_date,
                'discount' => $req->discount,
                'estimated_saving'=> $req->estimated_saving,
            ]);
        }

        $req->delete();

        return redirect('/request-for-edit')->with('message','Accepted !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $offer = Offer::findOrFail($id);
        if ($offer->picture != null) {
            $image_path = '/assets/offer_pics/' .   $offer->picture;

            if (File::exists($image_path)) {
                File::delete($image_path);
            }
        }
        $offer->delete();

        return redirect('/my-offers')->with('flash_message', 'Offer deleted!');
    }
}
