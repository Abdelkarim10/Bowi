<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Merchant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\UnauthorizedException;

class MerchantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $merchants = Merchant::all();
        return view('admin_dashboard.merchants.index', [
            'merchants' => $merchants
        ]);
    }

    public function merchantinfo(Request $request)
    {
        if (Auth::user()->role_id == 2) {
            $user = Auth::user();

            $merchant = Merchant::findOrFail($user->merchant->id);

            return view('admin_dashboard.merchants.info.index', [
                'merchant' => $merchant
            ]);
        }else if(Auth::user()->role_id == 3 && Session::get('view_as_merchant') == true){
            $merchant = Merchant::findOrFail(Session::get('admin_view_merchant_id'));
            return view('admin_dashboard.merchants.info.index', [
                'merchant' => $merchant
            ]);
        }
    }

    public function subscription()
    {
           $user = Auth::user();

        if($user->role_id == 2 || ($user->role_id == 3 && Session::get('view_as_merchant') == true))
       {

           if($user->role_id == 2)
           {
               $merchant = Merchant::findOrFail($user->merchant->id);
           }
           else
           {
               $merchant = Merchant::findOrFail(Session::get('admin_view_merchant_id'));
           }

           return view('admin_dashboard.merchants.subscription.index', [
               'merchant' => $merchant
           ]);
        }
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


    public function adminView(Request $request){

        if(Auth::user()->role_id != 3){
            // unauthorized access
            return redirect()->route('home.index');
        }

        $request->session()->put('view_as_merchant', false);
//        $request->session()->put('admin_view_merchant_id', null);
        return redirect()->route('merchants.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $merchant = Merchant::find($id);
        $countriesCodes=[
            "880",  "32",  "226",  "359",  "387",  "1-246",  "681",  "590",  "1-441",  "673",  "591",  "973","257",  "229",  "975",  "1-876", "267",  "685",  "599",  "55",  "1-242",  "44-1534",  "375",  "501",  "7",  "250",  "381",  "670",  "262",  "993",  "992",  "40",  "690",  "245",  "1-671",  "502", "30",  "240",  "590",  "81",  "592",  "44-1481",  "594",  "995",  "1-473",  "44",  "241",  "503",  "224",  "220",  "299",  "350",  "233",  "968",  "216",  "962",  "385",  "509",  "36",  "852",  "504", "58",  "1-787 ",  " 1-939",  "970",  "680",  "351",  "47",  "595",  "964",  "507",  "689",  "675",  "51",  "92",  "63",  "870",  "48",  "508",  "260",  "212",  "372",  "20",  "27",  "593",  "39",  "84",  "677",  "251",  "252",  "263",  "966",  "34",  "291",  "382",  "373",  "261",  "590",  "212",  "377",  "998",  "95",  "223",  "853",  "976",  "692",  "389",  "230",  "356",  "265",  "960",  "596",  "1-670",  "1-664",  "222",  "44-1624",  "256",  "255",  "60",  "52",  "972",  "33",  "246",  "290",  "358",  "679",  "500",  "691",  "298",  "505",  "31",  "47",  "264",  "678",  "687",  "227",  "672",  "234",  "64",  "977",  "674",  "683",  "682", "225",  "41",  "57",  "86",  "237",  "56",  "61",  "1",  "242",  "236",  "243",  "420",  "357",  "61",  "506",  "599",  "238",  "53",  "268",  "963",  "599",  "996",  "254",  "211",  "597",  "686",  "855",  "1-869",  "269",  "239",  "421",  "82",  "386",  "850",  "965",  "221",  "378",  "232",  "248",  "7",  "1-345",  "65",  "46",  "249",  "1-809 ",  " 1-829",  "1-767",  "253",  "45",  "1-284",  "49",  "967",  "213",  "598",  "262", "961",  "1-758",  "856",  "688",  "886",  "1-868",  "90",  "94",  "423",  "371",  "676",  "370",  "352",  "231",  "266",  "66","228",  "235",  "1-649",  "218",  "379",  "1-784",  "971",  "376",  "1-268",  "93",  "1-264",  "1-340",  "354",  "98",  "374",  "355",  "244", "1-684",  "54",  "61",  "43",  "297",  "91",  "358-18",  "994",  "353",  "62",  "380",  "974",  "258"
        ];
        sort($countriesCodes);

        return view('admin_dashboard.merchants.info.edit', [
            'merchant' => $merchant,
            'countriesCodes' => $countriesCodes,
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
            'logo'=> 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'business_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'city' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'zipcode' => 'numeric|required',
            'country_code'=>'required|string|max:255',
            'phone_number' => 'numeric|required',

        ]);

        $merchant = Merchant::find($id);


        $input = $request->all();
        $merchant->update($input);


        if ($request->hasFile('logo')) {

            if ($merchant->pic != null) {
                $image_path =public_path('/assets/merchants_pics/' .   $merchant->logo) ;

                if (File::exists($image_path)) {
                    File::delete($image_path);
                }
            }

            $image = $request->file('logo');

            $imageName = time() . $merchant->business_name .  '.' . $image->extension();


            $destinationPath = public_path('/assets/merchants_pics/');


            $image->move($destinationPath, $imageName);

            $merchant->update([
                "logo" => $imageName
            ]);


        }


        return redirect('/my-merchant-info')->with('message', '(Info Edited !)');
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
