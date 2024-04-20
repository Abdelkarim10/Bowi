<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $merchant = Auth::user()->merchant;
        $branches = Branch::where('merchant_id', $merchant->id)->get();
        return view('admin_dashboard.merchants.branches.index', [
            'branches' => $branches
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { $countries= Country::all();
        $branches=Branch::all();
        return view('admin_dashboard.merchants.branches.create', [
            "branches" =>   $branches,
               "countries"=> $countries
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
        $merchantId= Auth::user()->merchant->id;
        $request->validate([
            'city' => 'required|string|max:255',
            'language' => 'required|string|max:255',
            'country_id' => 'required|string|max:255',
            'longitude' => 'required|string|max:255',
            'latitude' => 'required|string|max:255',
        ]);
        $requestData = $request->all();
        Branch::create($requestData + ['merchant_id' => $merchantId]);
        return redirect('/merchant-branches')->with('message', ' created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $branches = Branch::find($id);
        return view('admin_dashboard.merchants.branches.show', [
            'branches' => $branches,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {    $countries= Country::all();
        $branch = Branch::find($id);
        return view('admin_dashboard.merchants.branches.edit', [
            'branch' => $branch,
            'countries'=>$countries
        ]);
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
        $request->validate([
        'city' => 'required|string|max:255',
        'language' => 'required|string|max:255',
        'country_id' => 'required|string|max:255',
        'longitude' => 'required|string|max:255',
        'latitude' => 'required|string|max:255',
    ]);
        $Branch = Branch::find($id);
      
        $input = $request->all();

        $Branch->update($input);
        return redirect('/merchant-branches')->with('message', ' Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Branches = Branch::findOrFail($id);

        $Branches->delete();

        return redirect('/merchant-branches')->with('flash_message', 'Branch deleted!');
    }
}
