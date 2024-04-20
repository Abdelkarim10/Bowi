<?php

namespace App\Http\Livewire;

use App\Models\HomeSection;
use App\Models\MerchantCategory;
use App\Models\MerchantSubCategory;
use Illuminate\Http\Request;
use Livewire\Component;
use Illuminate\Support\Facades\Redirect;
use Livewire\WithFileUploads;

class HomeSectionController extends Component
{
    use WithFileUploads;

    public $titleOffer;
    public $titleMerchant;
    public $titleCollaboration;
    public $merchantsIDCollaboration;
    public $merchantsID;
    public $merchant_category_id;
    public $merchant_sub_category_id;
    public $offersID;
    public $offer_type_id;
    public $image;
    public $pic;

    protected $rulesAd = [
        'merchantsID' => 'required',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ];
    protected $rulesAd1 = [
        'offersID' => 'required',
        'pic' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ];
    protected $rulesMerchants = [
        'titleMerchant' => 'required|string|max:255|min:3',
        'merchant_category_id' => 'required',
        'merchant_sub_category_id' => 'required',
    ];
    protected $rulesOffers = [
        'titleOffer' => 'required|string|max:255|min:3',
        'offer_type_id' => 'required',
    ];
    protected $rulesCollaboration = [
        'titleCollaboration' => 'required|string|max:255|min:3',
        'merchantsIDCollaboration' => 'required',
    ];

    public $merchants;
    public $merchant_categories;
    public $merchant_sub_categories;
    public $offers;
    public $offer_types;

    public $showAd = true;
    public $showMerchants = false;
    public $showOffers = false;
    public $showCollaboration = false;

    public $showMerchantForm = true;
    public $showOfferForm = false;

    public function showAd()
    {
        $this->showAd =true;
        $this->showMerchants = false;
        $this->showOffers = false;
        $this->showCollaboration = false;
    }

    public function showMerchants()
    {
        $this->showAd =false;
        $this->showMerchants = true;
        $this->showOffers = false;
        $this->showCollaboration = false;
    }

    public function showOffers()
    {
        $this->showAd =false;
        $this->showMerchants = false;
        $this->showOffers = true;
        $this->showCollaboration = false;
    }

    public function showCollaboration()
    {
        $this->showAd =false;
        $this->showMerchants = false;
        $this->showOffers = false;
        $this->showCollaboration = true;
    }

    public function showMerchantForm()
    {
        $this->showMerchantForm =true;
        $this->showOfferForm = false;
    }

    public function showOfferForm()
    {
        $this->showMerchantForm =false;
        $this->showOfferForm = true;
    }

    public function render()
    {
        return view('livewire.home-section-controller');
    }

    public function createMerchantAd()
    {
        $this->validate($this->rulesAd);
        $homeSection = new HomeSection();
        $homeSection->type = 'ad';
        $homeSection->merchant_id = $this->merchantsID;
        $homeSection->offer_id = null;
        $homeSection->image = $this->image->store('assets/home_section_pics', 'public');
        $homeSection->position = HomeSection::count() + 1;
        $homeSection->save();
        return Redirect::back()->with('message','Submitted !');
    }

    public function createOfferAd()
    {
        $this->validate($this->rulesAd1);
        $homeSection = new HomeSection();
        $homeSection->type = 'ad';
        $homeSection->merchant_id = null;
        $homeSection->offer_id = $this->offersID;
        $homeSection->image = $this->pic->store('assets/home_section_pics', 'public');
        $homeSection->position = HomeSection::count() + 1;
        $homeSection->save();
        return Redirect::back()->with('message','Submitted !');
    }

    public function createMerchants()
    {
        $this->validate($this->rulesMerchants);
        $homeSection = new HomeSection();
        $homeSection->type = 'merchants';
        $homeSection->title = $this->titleMerchant;
        $homeSection->merchant_sub_category_id = $this->merchant_sub_category_id;
        $homeSection->position = HomeSection::count() + 1;
        $homeSection->save();
        return Redirect::back()->with('message','Submitted !');
    }

    public function createOffers()
    {
        $this->validate($this->rulesOffers);
        $homeSection = new HomeSection();
        $homeSection->type = 'offers';
        $homeSection->title = $this->titleOffer;
        $homeSection->offer_type_id = $this->offer_type_id;
        $homeSection->position = HomeSection::count() + 1;
        $homeSection->save();
        return Redirect::back()->with('message','Submitted !');
    }

    public function createCollaboration()
    {
        $this->validate($this->rulesCollaboration);
        $homeSection = new HomeSection();
        $homeSection->type = 'collaboration';
        $homeSection->title = $this->titleCollaboration;
        $homeSection->merchant_id = $this->merchantsIDCollaboration;
        $homeSection->position = HomeSection::count() + 1;
        $homeSection->save();
        return Redirect::back()->with('message','Submitted !');
    }

    public function mount()
    {
        $this->merchant_categories = MerchantCategory::all();
        if($this->merchant_category_id != null){
            $this->merchant_sub_categories = MerchantSubCategory::where('category_id',$this->merchant_category_id)->get();
        }
        else{
            $this->merchant_sub_categories =[];
        }
    }

    public function updated()
    {
        if($this->merchant_category_id != null){
            $this->merchant_sub_categories = MerchantSubCategory::where('category_id',$this->merchant_category_id)->get();
        }
        else{
            $this->merchant_sub_categories =[];
        }
    }
}
