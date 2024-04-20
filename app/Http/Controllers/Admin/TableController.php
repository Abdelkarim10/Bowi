<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaymentReceived;
use App\Models\User;
use App\Models\UserOffer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pays = PaymentReceived::where(DB::raw('YEAR(created_at)'), now()->year)->get();


        $savings =UserOffer::where(DB::raw('YEAR(created_at)'), now()->year)->get();
            

        $usersnow =User::where(DB::raw('YEAR(created_at)'), now()->year)->get(); 
        // $useroffers = DB::table('user_offers')
        //     ->select(DB::raw('Month(created_at) as month'))
        //     ->where(DB::raw('YEAR(created_at)'), now()->year)
        //     ->get();

        return view('admin_dashboard.analytics.table.index', [
            // 'analytics' => $analytics,
            'usersnow' => $usersnow,
            // 'offers' => $offers,
            'savings' => $savings,
            'pays' => $pays
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
