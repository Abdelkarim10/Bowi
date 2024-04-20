<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Analytic;
use App\Models\Merchant;
use App\Models\OfferType;
use App\Models\PaymentReceived;
use App\Models\User;
use App\Models\UserOffer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class  AnalyticController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payment = DB::table('payment_receiveds')
            ->select(DB::raw('Month(created_at) as month'), DB::raw('SUM(amount) as num'))
            ->where(DB::raw('YEAR(created_at)'), now()->year)
            ->groupBy(DB::raw('Month(created_at)'))
            ->get();

        $analytics = Analytic::all();
        
        $nbOfAllUsers = User::where('activated', 1)->count();

        $T = DB::table('user_offers')
            ->select('type_id', DB::raw('count(*) as count'))
            ->join('offers', 'offers.id', '=', 'user_offers.offer_id')
            ->groupBy('type_id')
            ->orderBy('count', 'DESC')
            ->first();

        $mostUsedType = OfferType::where('id', $T->type_id)->first();

        $M = DB::table('user_offers')
            ->select('merchant_id', DB::raw('count(*) as count'))
            ->join('offers', 'offers.id', '=', 'user_offers.offer_id')
            ->groupBy('merchant_id')
            ->orderBy('count', 'DESC')
            ->first();

        $mostMerchant = Merchant::where('id', $M->merchant_id)->first();

        $pays = PaymentReceived::where(DB::raw('YEAR(created_at)'), now()->year)->get();


        $savings =UserOffer::where(DB::raw('YEAR(created_at)'), now()->year)->get();
            

        $usersnow =User::where(DB::raw('YEAR(created_at)'), now()->year)->get(); 
            
        return view('admin_dashboard.analytics.index', [
            'analytics' => $analytics,
            'payment' => $payment,

            'nbOfAllUsers' => $nbOfAllUsers,
            'mostUsedType' => $mostUsedType,
            'mostMerchant' => $mostMerchant,

            
            'usersnow' => $usersnow,
            'savings' => $savings,
            'pays' => $pays
        ]);
    }

    public function index1()
    {
        $users = DB::table('users')
            ->select(DB::raw('Month(created_at) as month'), DB::raw('count(*) as num'))
            ->where(DB::raw('YEAR(created_at)'), now()->year)
            ->groupBy(DB::raw('Month(created_at)'))
            ->get();

        $analytics = Analytic::all();
        
        $nbOfAllUsers = User::where('activated', 1)->count();

        $T = DB::table('user_offers')
            ->select('type_id', DB::raw('count(*) as count'))
            ->join('offers', 'offers.id', '=', 'user_offers.offer_id')
            ->groupBy('type_id')
            ->orderBy('count', 'DESC')
            ->first();

        $mostUsedType = OfferType::where('id', $T->type_id)->first();

        $M = DB::table('user_offers')
            ->select('merchant_id', DB::raw('count(*) as count'))
            ->join('offers', 'offers.id', '=', 'user_offers.offer_id')
            ->groupBy('merchant_id')
            ->orderBy('count', 'DESC')
            ->first();

        $mostMerchant = Merchant::where('id', $M->merchant_id)->first();

        $pays = PaymentReceived::where(DB::raw('YEAR(created_at)'), now()->year)->get();


        $savings =UserOffer::where(DB::raw('YEAR(created_at)'), now()->year)->get();
            

        $usersnow =User::where(DB::raw('YEAR(created_at)'), now()->year)->get(); 
            
        return view('admin_dashboard.analytics.second_index', [
            'analytics' => $analytics,
            'users' => $users,

            'nbOfAllUsers' => $nbOfAllUsers,
            'mostUsedType' => $mostUsedType,
            'mostMerchant' => $mostMerchant,

            
            'usersnow' => $usersnow,
            'savings' => $savings,
            'pays' => $pays
        ]);
    }

    public function index2()
    {
        $useroffers = DB::table('user_offers')
            ->select(DB::raw('Month(created_at) as month'), DB::raw('count(*) as num'))
            ->where(DB::raw('YEAR(created_at)'), now()->year)
            ->groupBy(DB::raw('Month(created_at)'))
            ->get();

        $analytics = Analytic::all();
        
        $nbOfAllUsers = User::where('activated', 1)->count();

        $T = DB::table('user_offers')
            ->select('type_id', DB::raw('count(*) as count'))
            ->join('offers', 'offers.id', '=', 'user_offers.offer_id')
            ->groupBy('type_id')
            ->orderBy('count', 'DESC')
            ->first();

        $mostUsedType = OfferType::where('id', $T->type_id)->first();

        $M = DB::table('user_offers')
            ->select('merchant_id', DB::raw('count(*) as count'))
            ->join('offers', 'offers.id', '=', 'user_offers.offer_id')
            ->groupBy('merchant_id')
            ->orderBy('count', 'DESC')
            ->first();

        $mostMerchant = Merchant::where('id', $M->merchant_id)->first();

        $pays = PaymentReceived::where(DB::raw('YEAR(created_at)'), now()->year)->get();


        $savings =UserOffer::where(DB::raw('YEAR(created_at)'), now()->year)->get();
            

        $usersnow =User::where(DB::raw('YEAR(created_at)'), now()->year)->get(); 


        // $admintables = DB::table('user_offers')
        // ->join('offers', 'offers.id', '=', 'user_offers.offer_id') 
        // ->join( 'offer_types', 'offer_types.id','=','offers.type_id') 
        // ->select('offers.name as offer_name','offer_types.name as offer_type' ,'saving','code','user_offers.created_at as UserOfferCreated_at')     
        // ->get();

        $admintables = UserOffer::paginate(10);



            
        return view('admin_dashboard.analytics.third_index', [
            'analytics' => $analytics,
            'useroffers' => $useroffers,
            'admintables'=> $admintables,
            

            'nbOfAllUsers' => $nbOfAllUsers,
            'mostUsedType' => $mostUsedType,
            'mostMerchant' => $mostMerchant,

            
            'usersnow' => $usersnow,
            'savings' => $savings,
            'pays' => $pays
        ]);
    }

    public function index3()
    {
        $userSaving = DB::table('user_offers')
            ->select(DB::raw('Month(created_at) as month'), DB::raw('SUM(saving) as num'))
            ->where(DB::raw('YEAR(created_at)'), now()->year)
            ->groupBy(DB::raw('Month(created_at)'))
            ->get();

        $analytics = Analytic::all();
        
        $nbOfAllUsers = User::where('activated', 1)->count();

        $T = DB::table('user_offers')
            ->select('type_id', DB::raw('count(*) as count'))
            ->join('offers', 'offers.id', '=', 'user_offers.offer_id')
            ->groupBy('type_id')
            ->orderBy('count', 'DESC')
            ->first();

        $mostUsedType = OfferType::where('id', $T->type_id)->first();

        $M = DB::table('user_offers')
            ->select('merchant_id', DB::raw('count(*) as count'))
            ->join('offers', 'offers.id', '=', 'user_offers.offer_id')
            ->groupBy('merchant_id')
            ->orderBy('count', 'DESC')
            ->first();

        $mostMerchant = Merchant::where('id', $M->merchant_id)->first();

        $pays = PaymentReceived::where(DB::raw('YEAR(created_at)'), now()->year)->get();


        $savings =UserOffer::where(DB::raw('YEAR(created_at)'), now()->year)->get();
            

        $usersnow =User::where(DB::raw('YEAR(created_at)'), now()->year)->get(); 
            
        return view('admin_dashboard.analytics.fourth_index', [
            'analytics' => $analytics,
            'userSaving' => $userSaving,

            'nbOfAllUsers' => $nbOfAllUsers,
            'mostUsedType' => $mostUsedType,
            'mostMerchant' => $mostMerchant,

            
            'usersnow' => $usersnow,
            'savings' => $savings,
            'pays' => $pays
        ]);
    }

    public function merchantstatic()
    {
        $merchant_id=Auth::user()->merchant->id;

        $buy1get1 = DB::table('user_offers')
            ->select( DB::raw('Month(user_offers.created_at) as month'), DB::raw('count(*) as num'))
            ->join('offers', 'offers.id', '=', 'user_offers.offer_id')
            ->where('offers.type_id', 1)
            ->where('merchant_id',$merchant_id)
            ->where(DB::raw('YEAR(user_offers.created_at)'), now()->year)
            ->groupBy(DB::raw('Month(user_offers.created_at)'))
            ->get();

        $mostSoldT = DB::table('user_offers')
            ->select( 'type_id',DB::raw('count(type_id) as count'))
            ->join('offers', 'offers.id', '=', 'user_offers.offer_id')
            ->where('offers.merchant_id', $merchant_id)
            ->orderBy( 'count', 'DESC' )
            ->groupBy( 'type_id' )
            ->first();
        $mostSoldType = OfferType::where('id',$mostSoldT->type_id)->first();

        $mostLoyalCust = DB::table('user_offers')
            ->select( 'user_id',DB::raw('count(user_id) as count'))
            ->join('offers', 'offers.id', '=', 'user_offers.offer_id')
            ->where('offers.merchant_id', $merchant_id)
            ->orderBy( 'count', 'DESC' )
            ->groupBy( 'user_id' )
            ->first();
        $mostLoyalCustomer = User::where('id',$mostLoyalCust->user_id)->first();

        $totalCustomerNumber = DB::table('user_offers')
            ->select('user_id', DB::raw('count(*) as count'))
            ->join('offers', 'offers.id', '=', 'user_offers.offer_id')
            ->where('offers.merchant_id', $merchant_id)
            ->groupBy('user_id')
            ->having('count', '>', 0)
            ->count();

        return view('admin_dashboard.merchants.merchant_analytics.index', [
            'buy1get1' => $buy1get1,
            'mostSoldType'=>$mostSoldType,
            'mostLoyalCustomer'=> $mostLoyalCustomer,
            'totalCustomerNumber' => $totalCustomerNumber
        ]);
    }
    public function merchantstatic1()
    {
        $merchant_id=Auth::user()->merchant->id;

        $discount = DB::table('user_offers')
          ->select(DB::raw('Month(user_offers.created_at) as month'), DB::raw('count(*) as num'))
          ->join('offers', 'offers.id', '=', 'user_offers.offer_id')
          ->where('offers.type_id', 2)
          ->where('merchant_id',$merchant_id)
          ->where(DB::raw('YEAR(user_offers.created_at)'), now()->year)
          ->groupBy(DB::raw('Month(user_offers.created_at)'))
           ->get();

        $mostSoldT = DB::table('user_offers')
           ->select( 'type_id',DB::raw('count(type_id) as count'))
           ->join('offers', 'offers.id', '=', 'user_offers.offer_id')
           ->where('offers.merchant_id', $merchant_id)
           ->orderBy( 'count', 'DESC' )
           ->groupBy( 'type_id' )
           ->first();
        $mostSoldType = OfferType::where('id',$mostSoldT->type_id)->first();

        $mostLoyalCust = DB::table('user_offers')
           ->select( 'user_id',DB::raw('count(user_id) as count'))
           ->join('offers', 'offers.id', '=', 'user_offers.offer_id')
           ->where('offers.merchant_id', $merchant_id)
           ->orderBy( 'count', 'DESC' )
           ->groupBy( 'user_id' )
           ->first();
        $mostLoyalCustomer = User::where('id',$mostLoyalCust->user_id)->first();

        $totalCustomerNumber = DB::table('user_offers')
           ->select('user_id', DB::raw('count(*) as count'))
           ->join('offers', 'offers.id', '=', 'user_offers.offer_id')
           ->where('offers.merchant_id', $merchant_id)
           ->groupBy('user_id')
           ->having('count', '>', 0)
           ->count();

        return view('admin_dashboard.merchants.merchant_analytics.second_index', [
            'discount' => $discount,
            'mostSoldType'=>$mostSoldType,
            'mostLoyalCustomer'=> $mostLoyalCustomer,
            'totalCustomerNumber' => $totalCustomerNumber
        ]);
    }
    public function merchantstatic2()
    {
        $merchant_id=Auth::user()->merchant->id;

        $all = DB::table('user_offers')
          ->select(DB::raw('Month(user_offers.created_at) as month'), DB::raw('count(*) as num'))
          ->join('offers', 'offers.id', '=', 'user_offers.offer_id')     
          ->where('merchant_id',$merchant_id)
          ->groupBy(DB::raw('Month(user_offers.created_at)'))
          ->get();

        $mostSoldT = DB::table('user_offers')
            ->select( 'type_id',DB::raw('count(type_id) as count'))
            ->join('offers', 'offers.id', '=', 'user_offers.offer_id')
            ->where('offers.merchant_id', $merchant_id)
            ->orderBy( 'count', 'DESC' )
            ->groupBy( 'type_id' )
            ->first();
        $mostSoldType = OfferType::where('id',$mostSoldT->type_id)->first();
        
        $mostLoyalCust = DB::table('user_offers')
          ->select( 'user_id',DB::raw('count(user_id) as count'))
          ->join('offers', 'offers.id', '=', 'user_offers.offer_id')
          ->where('offers.merchant_id', $merchant_id)
          ->orderBy( 'count', 'DESC' )
          ->groupBy( 'user_id' )
          ->first();
        $mostLoyalCustomer = User::where('id',$mostLoyalCust->user_id)->first();

        $totalCustomerNumber = DB::table('user_offers')
          ->select('user_id', DB::raw('count(*) as count'))
          ->join('offers', 'offers.id', '=', 'user_offers.offer_id')
          ->where('offers.merchant_id', $merchant_id)
          ->groupBy('user_id')
          ->having('count', '>', 0)
          ->count();

        return view('admin_dashboard.merchants.merchant_analytics.third_index', [
            'all' => $all ,
            'mostSoldType'=>$mostSoldType,
            'mostLoyalCustomer'=> $mostLoyalCustomer,
            'totalCustomerNumber' => $totalCustomerNumber
        ]);
    }

    public function merchantstatictable()
    {
        $merchant_id = Auth::user()->merchant->id;
        $useroffers = DB::table('user_offers')
            ->select('offers.name as offer_name','offer_types.name as type_name','saving','code',DB::raw("DATE_FORMAT(user_offers.created_at, '%d/%m/%Y') as created_at"))
            ->join('offers', 'offers.id', '=', 'user_offers.offer_id')  
            ->join('offer_types','offer_types.id','=','offers.type_id')   
            ->where('merchant_id',$merchant_id)
            ->paginate(10);
                
        return view('admin_dashboard.merchants.merchant_analytics.table', [
            'useroffers' => $useroffers,
        ]);
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
