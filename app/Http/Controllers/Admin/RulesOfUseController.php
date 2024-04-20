<?php

namespace App\Http\Controllers\Admin;

use App\Models\RulesOfUse;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRulesOfUseRequest;
use App\Http\Requests\UpdateRulesOfUseRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class RulesOfUseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Rules = RulesOfUse::all();
        return view('admin_dashboard.users.rules-of-use.index', [
            'Rules' => $Rules
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin_dashboard.users.rules-of-use.create', [

            "Rules" => RulesOfUse::all(),

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRulesOfUseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|min:3|max:255',
            'text' => 'required|string',
        ]);
        
        $requestData = $request->all();

        RulesOfUse::create($requestData);

        return redirect('/rules-of-use')->with('message', 'New rule added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RulesOfUse  $rulesOfUse
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Rules = RulesOfUse::find($id);
        return view('admin_dashboard.users.rules-of-use.show', [
            'Rules' => $Rules,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RulesOfUse  $rulesOfUse
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $Rules = RulesOfUse::find($id);
        return view('admin_dashboard.users.rules-of-use.edit', [
            'Rules' => $Rules,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRulesOfUseRequest  $request
     * @param  \App\Models\RulesOfUse  $rulesOfUse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|min:3|max:255',
            'text' => 'required|string',
        ]);
        $pp = RulesOfUse::find($id);
        $pp->update($request->all());
        return redirect('/rules-of-use')->with('message','Updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RulesOfUse  $rulesOfUse
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rule = RulesOfUse::findOrFail($id);

        $rule->delete();


        return redirect('/rules-of-use')->with('flash_message','Deleted !');
    }
}
