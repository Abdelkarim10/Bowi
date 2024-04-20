<?php

namespace App\Http\Controllers\Admin;

use App\Models\ReturnPolicy;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ReturnPolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ReturnPolicies = ReturnPolicy::all();
        return view('admin_dashboard.users.return-policy.index', [
            'ReturnPolicies' => $ReturnPolicies,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin_dashboard.users.return-policy.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreReturnPolicyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|min:3|max:255',
            'text' => 'required|string',
        ]);
        $requestData = $request->all();

        ReturnPolicy::create($requestData);

        return redirect('/return-policies')->with('message','Added !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReturnPolicy  $returnPolicy
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ReturnPolicy = ReturnPolicy::find($id);
        return view('admin_dashboard.users.return-policy.show', [
            'ReturnPolicy' => $ReturnPolicy,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReturnPolicy  $returnPolicy
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pp = ReturnPolicy::find($id);
        return view('admin_dashboard.users.return-policy.edit', [
            'ReturnPolicy' => $pp,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReturnPolicyRequest  $request
     * @param  \App\Models\ReturnPolicy  $returnPolicy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|min:3|max:255',
            'text' => 'required|string',
        ]);
        $pp = ReturnPolicy::find($id);
        $pp->update($request->all());
        return redirect('/return-policies')->with('message','Edited !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReturnPolicy  $returnPolicy
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ReturnPolicies = ReturnPolicy::findOrFail($id);

        $ReturnPolicies->delete();


        return Redirect::back()->with('flash_message','Deleted !');
    }
}
