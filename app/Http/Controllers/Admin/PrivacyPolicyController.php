<?php

namespace App\Http\Controllers\Admin;

use App\Models\PrivacyPolicy;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePrivacyPolicyRequest;
use App\Http\Requests\UpdatePrivacyPolicyRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PrivacyPolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $PrivacyPolicies = PrivacyPolicy::all();
        return view('admin_dashboard.users.privacy-policies.index', [
            'PrivacyPolicies' => $PrivacyPolicies,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin_dashboard.users.privacy-policies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePrivacyPolicyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|min:3|max:255',
            'text' => 'required|string',
        ]);
        $requestData = $request->all();

        PrivacyPolicy::create($requestData);

        return redirect('/privacy-policies')->with('message','Added !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PrivacyPolicy  $privacyPolicy
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $PrivacyPolicy = PrivacyPolicy::find($id);
        return view('admin_dashboard.users.privacy-policies.show', [
            'PrivacyPolicy' => $PrivacyPolicy,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PrivacyPolicy  $privacyPolicy
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pp = PrivacyPolicy::find($id);
        return view('admin_dashboard.users.privacy-policies.edit', [
            'PrivacyPolicy' => $pp,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePrivacyPolicyRequest  $request
     * @param  \App\Models\PrivacyPolicy  $privacyPolicy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|min:3|max:255',
            'text' => 'required|string',
        ]);
        $pp = PrivacyPolicy::find($id);
        $pp->update($request->all());
        return redirect('/privacy-policies')->with('message','Updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PrivacyPolicy  $privacyPolicy
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $PrivacyPolicies = PrivacyPolicy::findOrFail($id);

        $PrivacyPolicies->delete();


        return Redirect::back()->with('flash_message','Deleted !');
    }
}
