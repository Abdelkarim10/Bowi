<?php

namespace App\Http\Controllers\Website;

use App\Models\ContactUs;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactUsRequest;
use App\Http\Requests\UpdateContactUsRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $c = ContactUs::all();
        return view('admin_dashboard.users.contact-us.index', [
            'Qs' => $c
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
     * @param  \App\Http\Requests\StoreContactUsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContactUsRequest $request)
    {
        $validated = $request->validated();
        $message = new ContactUs();
        $message->id=$request->id;
        $message->name=$validated['name'];
        $message->email=$validated['email'];
        $message->title=$validated['title'];
        $message->message=$validated['message'];
        $message->save();
        return Redirect::back()->with('message','Submitted !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ContactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Qs = ContactUs::find($id);
        $Qs->update(['is_read' => true]);
        $Qs->save();
        return view('admin_dashboard.users.contact-us.show', [
            'Qs' => $Qs,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ContactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function edit(ContactUs $contactUs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateContactUsRequest  $request
     * @param  \App\Models\ContactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateContactUsRequest $request, ContactUs $contactUs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ContactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $q = ContactUs::findOrFail($id);
        $q->delete();
        return redirect('/contact-us')->with('flash_message', 'Deleted!');
    }
}
