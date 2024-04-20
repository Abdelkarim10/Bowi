<?php

namespace App\Http\Controllers;

use App\Models\HomeSection;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHomeSectionRequest;
use App\Http\Requests\UpdateHomeSectionRequest;
use App\Models\Newsroom;
use App\Models\Merchant;
use App\Models\MerchantCategory;
use App\Models\MerchantSubCategory;
use App\Models\Offer;
use App\Models\OfferType;
use Illuminate\Http\Request;

class HomeSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin_dashboard.home_section.index',[
            'homesections'=>HomeSection::orderBy('position')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin_dashboard.home_section.create',[

            "homeSections" => HomeSection::all(),
            "merchants" => Merchant::where("activated",1)->where("accepted",1)->get(),
            "merchant_categories" => MerchantCategory::all(),
            "merchant_sub_categories" => MerchantSubCategory::all(),
            "offers" => Offer:: whereHas("merchants",function($q) {$q->where("activated",1)->where("accepted",1);})->get(),
            "offer_types" => OfferType::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreHomeSectionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $requestData = $request->all();
        HomeSection::create($requestData);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HomeSection  $homeSection
     * @return \Illuminate\Http\Response
     */
    public function show(HomeSection $homeSection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HomeSection  $homeSection
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hs = HomeSection::find($id);
        return view('admin_dashboard.home_section.edit', [
            'homesection' => $hs,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateHomeSectionRequest  $request
     * @param  \App\Models\HomeSection  $homeSection
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHomeSectionRequest $request, HomeSection $homeSection)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HomeSection  $homeSection
     * @return \Illuminate\Http\Response
     */
    public function destroy(HomeSection $homeSection)
    {
        //
    }
}
