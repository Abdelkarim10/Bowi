<?php

namespace App\Http\Controllers\Admin;

use App\Models\RequestForEdit;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRequestForEditRequest;
use App\Http\Requests\UpdateRequestForEditRequest;
use App\Models\Merchant;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class RequestForEditController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Reqs = RequestForEdit::all();
        return view('admin_dashboard.users.edits-request.index', [
            'Reqs' => $Reqs,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();

        $merchant = Merchant::findOrFail($user->merchant->id);
        $offers = $merchant->offers()->get();
        return view('admin_dashboard.merchants.merchants_offer.index', [
            'offers' => $offers
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRequestForEditRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        // $input['offer_id'] = $request->offer->id;

        $user = Auth::user();

        $input['merchant_id'] = $user->merchant->id;

        $ReqForEdit = RequestForEdit::create($input);

        if ($request->hasFile('picture')) {

            $image = $request->file('picture');


            $imageName = time() . $ReqForEdit->name .  '.' . $image->extension();


            $destinationPath = public_path('/assets/offer_pics/');


            $image->move($destinationPath, $imageName);


            $ReqForEdit->update([
                "picture" => $imageName
            ]);
        }

        return redirect('/my-offers')->with('message','Request Sent !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RequestForEdit  $requestForEdit
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $req = RequestForEdit::find($id);
        $offer = Offer::find($req->offer_id);
        return view('admin_dashboard.users.edits-request.show', [
            'req' => $req,
            'offer' => $offer
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RequestForEdit  $requestForEdit
     * @return \Illuminate\Http\Response
     */
    public function edit(RequestForEdit $requestForEdit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRequestForEditRequest  $request
     * @param  \App\Models\RequestForEdit  $requestForEdit
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequestForEditRequest $request, RequestForEdit $requestForEdit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RequestForEdit  $requestForEdit
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $req = RequestForEdit::findOrFail($id);

        if ($req->picture != null) {
            $image_path = public_path('/assets/offer_pics/' .   $req->picture);

            if (File::exists($image_path)) {
                File::delete($image_path);
            }
        }

        $req->delete();


        return redirect('/request-for-edit')->with('flash_message','Declined !');
    }
}
