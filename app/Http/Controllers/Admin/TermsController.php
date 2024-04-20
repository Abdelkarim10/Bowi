<?php

namespace App\Http\Controllers\Admin;

use App\Models\Terms;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTermsRequest;
use App\Http\Requests\UpdateTermsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TermsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $terms = Terms::all();
        return view('admin_dashboard.users.terms.index', [
            'terms' => $terms,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin_dashboard.users.terms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTermsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|min:3|max:255',
            'term' => 'required|string',
        ]);
        $requestData = $request->all();

        Terms::create($requestData);

        return redirect('/term')->with('message','Added !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Terms  $terms
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $term = Terms::find($id);
        return view('admin_dashboard.users.terms.show', [
            'term' => $term,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Terms  $terms
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $term = Terms::find($id);
        return view('admin_dashboard.users.terms.edit', [
            'term' => $term,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTermsRequest  $request
     * @param  \App\Models\Terms  $terms
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|min:3|max:255',
            'term' => 'required|string',
        ]);
        $term = Terms::find($id);
        $term->update($request->all());
        return redirect('/term')->with('message','Edited !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Terms  $terms
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $terms = Terms::findOrFail($id);

        $terms->delete();


        return Redirect::back()->with('flash_message','Deleted !');
    }
}
