<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\Faq;
use App\Models\faqs;
use App\Models\MediaAssetsImages;
use App\Models\MerchantCategory;
use App\Models\MerchantSubCategory;
use App\Models\Newsroom;
use App\Models\Plan;
use App\Models\PrivacyPolicy;
use App\Models\ReturnPolicy;
use App\Models\RulesOfUse;
use App\Models\Terms;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('Website.home',[
            'countries' => \App\Models\Country::all(),
        ]);
    }

    public function becomePartner()
    {
        $countriesCodes=[
            "880",  "32",  "226",  "359",  "387",  "1-246",  "681",  "590",  "1-441",  "673",  "591",  "973","257",  "229",  "975",  "1-876", "267",  "685",  "599",  "55",  "1-242",  "44-1534",  "375",  "501",  "7",  "250",  "381",  "670",  "262",  "993",  "992",  "40",  "690",  "245",  "1-671",  "502", "30",  "240",  "590",  "81",  "592",  "44-1481",  "594",  "995",  "1-473",  "44",  "241",  "503",  "224",  "220",  "299",  "350",  "233",  "968",  "216",  "962",  "385",  "509",  "36",  "852",  "504", "58",  "1-787 ",  " 1-939",  "970",  "680",  "351",  "47",  "595",  "964",  "507",  "689",  "675",  "51",  "92",  "63",  "870",  "48",  "508",  "260",  "212",  "372",  "20",  "27",  "593",  "39",  "84",  "677",  "251",  "252",  "263",  "966",  "34",  "291",  "382",  "373",  "261",  "590",  "212",  "377",  "998",  "95",  "223",  "853",  "976",  "692",  "389",  "230",  "356",  "265",  "960",  "596",  "1-670",  "1-664",  "222",  "44-1624",  "256",  "255",  "60",  "52",  "972",  "33",  "246",  "290",  "358",  "679",  "500",  "691",  "298",  "505",  "31",  "47",  "264",  "678",  "687",  "227",  "672",  "234",  "64",  "977",  "674",  "683",  "682", "225",  "41",  "57",  "86",  "237",  "56",  "61",  "1",  "242",  "236",  "243",  "420",  "357",  "61",  "506",  "599",  "238",  "53",  "268",  "963",  "599",  "996",  "254",  "211",  "597",  "686",  "855",  "1-869",  "269",  "239",  "421",  "82",  "386",  "850",  "965",  "221",  "378",  "232",  "248",  "7",  "1-345",  "65",  "46",  "249",  "1-809 ",  " 1-829",  "1-767",  "253",  "45",  "1-284",  "49",  "967",  "213",  "598",  "262", "961",  "1-758",  "856",  "688",  "886",  "1-868",  "90",  "94",  "423",  "371",  "676",  "370",  "352",  "231",  "266",  "66","228",  "235",  "1-649",  "218",  "379",  "1-784",  "971",  "376",  "1-268",  "93",  "1-264",  "1-340",  "354",  "98",  "374",  "355",  "244", "1-684",  "54",  "61",  "43",  "297",  "91",  "358-18",  "994",  "353",  "62",  "380",  "974",  "258"
        ];
        sort($countriesCodes);
        return view('Website.becomePartner', [
            'countries' => \App\Models\Country::all(),
            'categories' => \App\Models\MerchantCategory::all(),
            'subCategories' => \App\Models\MerchantSubCategory::all(),
            'countriesCodes' => $countriesCodes,
        ]);
    }
    public function login()
    {
        return view('auth.login');
    }
    public function pricing()
    {
        return view('Website.pricing',[
            "plans" => Plan::all(),
            'countries' => \App\Models\Country::all(),
        ]);
    }

    //company

    public function aboutUs()
    {
        return view('Website.company.aboutUs',[
            'countries' => \App\Models\Country::all(),
            'aboutuss' => AboutUs::all(),
        ]);
    }

    public function newsRoom()
    {
        return view('Website.company.newsRoom', [
            "news" => Newsroom::all(),
            'countries' => \App\Models\Country::all(),
        ]);
    }
    public function newsRoomPost($id)
    {
        $new = Newsroom::findOrFail($id);
        return view('Website.company.newsRoomPost',[
            "new" => $new,
            'countries' => \App\Models\Country::all(),
        ]);
    }

    public function careers()
    {
        return view('Website.company.careers',[
            'countries' => \App\Models\Country::all(),
        ]);
    }

    public function contactUs()
    {
        return view('Website.company.contactUs',[
            'countries' => \App\Models\Country::all(),
        ]);
    }

    //howItWorks

    // public function watchVideo()
    // {
    //     return view('Website.howItWorks.watchVideo');
    // }

    public function mediaAssets()
    {
        return view('Website.howItWorks.mediaAssets',[
            'countries' => \App\Models\Country::all(),
            'images' => MediaAssetsImages::all(),
        ]);
    }

    public function rulesOfUse()
    {
        return view('Website.howItWorks.rulesOfUse',[
            'countries' => \App\Models\Country::all(),
            'rules' => RulesOfUse::all(),
        ]);
    }

    public function FAQs()
    {
        return view('Website.howItWorks.FAQs', [
            "faqs" => Faq::all(),
            'countries' => \App\Models\Country::all(),
        ]);
    }

    //Legal

    public function terms()
    {
        return view('Website.legal.terms',[
            "terms" => Terms::all(),
            'countries' => \App\Models\Country::all(),
        ]);
    }

    public function privacy()
    {
        return view('Website.legal.privacy',[
            "PrivacyPolicies" => PrivacyPolicy::all(),
            'countries' => \App\Models\Country::all(),
        ]);
    }

    public function returnPolicy(){
        return view('Website.legal.returnPolicy',[
            "ReturnPolicies" => ReturnPolicy::all(),
            'countries' => \App\Models\Country::all(),
        ]);
    }
}
