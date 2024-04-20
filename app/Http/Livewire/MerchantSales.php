<?php

namespace App\Http\Livewire;

use App\Models\Branch;
use App\Models\Merchant;
use App\Models\OfferType;
use App\Models\UserOffer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\UnauthorizedException;
use Livewire\Component;

class MerchantSales extends Component
{
    public $date = "allTimes";
    public $branch = "allBranches";

    public $showDiv = false;

    public $usedOffers;
    public $totalOffers;
    public $totalCustomerNumber;
    public $offerTypes;
    public $bestSellingOffer;
    public $lowestSellingOffer;

    public function showDiv()
    {
        $d = $this->date;
        $d= preg_split("/-/",$d);

        $this->usedOffers = $this->usedOffers($d);
        $this->totalOffers = $this->totalOffers($d);
        $this->totalCustomerNumber = $this->totalCustomerNumber($d);
        $this->offerTypes = $this->offerTypes();
        $this->bestSellingOffers = $this->bestSellingOffer($d);
        $this->lowestSellingOffers = $this->lowestSellingOffer($d);
        $this->showDiv = true;
    }

    public function render()
    {
        $this->showDiv();
        return view('livewire.merchant-sales',[
            'DBDates' => $this->DBDates(),
            'DBBranches' => $this->DBBranches(),
        ]);
    }

    public function DBDates(){

        if(Auth::user()->role_id == 2) {
        $merchant = Merchant::where('user_id', Auth::user()->id)->first();

        }else if(Auth::user()->role_id == 3 && Session::get('view_as_merchant') == true){
            $merchant = Merchant::findOrFail(Session::get('admin_view_merchant_id'));
        }else{
            throw new UnauthorizedException();
        }

        $dates = UserOffer::select(
            DB::raw('YEAR(user_offers.created_at) year, MONTH(user_offers.created_at) month')
            )->join('offers', 'offers.id', '=', 'user_offers.offer_id')
            ->where('offers.merchant_id', $merchant->id)
            ->groupBy('year', 'month')
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->get()
            ->unique('month', 'year');
        return $dates;
    }

    public function DBBranches(){
        if(Auth::user()->role_id == 2) {
            $merchant = Merchant::where('user_id', Auth::user()->id)->first();

        }else if(Auth::user()->role_id == 3 && Session::get('view_as_merchant') == true){
            $merchant = Merchant::findOrFail(Session::get('admin_view_merchant_id'));
        }else{
            throw new UnauthorizedException();
        }
        $branches = Branch::where('merchant_id', $merchant->id)->get();
        return $branches;
    }

    public function usedOffers($d){
        if(Auth::user()->role_id == 2) {
            $merchant = Merchant::where('user_id', Auth::user()->id)->first();

        }else if(Auth::user()->role_id == 3 && Session::get('view_as_merchant') == true){
            $merchant = Merchant::findOrFail(Session::get('admin_view_merchant_id'));
        }else{
            throw new UnauthorizedException();
        }

        if($this->date == "allTimes" && $this->branch == "allBranches"){
            $usedOffers = DB::table('user_offers')
                    ->select('name','offer_id','type_id', DB::raw('count(*) as count'))
                    ->join('offers', 'offers.id', '=', 'user_offers.offer_id')
                    ->where('offers.merchant_id', $merchant->id)
                    ->groupBy('offer_id')
                    ->orderBy('count', 'DESC')
                    ->get();
        }
        elseif($this->date != "allTimes" && $this->branch == "allBranches"){
            $usedOffers = DB::table('user_offers')
                ->select('name','offer_id','type_id', DB::raw('count(*) as count'))
                ->join('offers', 'offers.id', '=', 'user_offers.offer_id')
                ->where('offers.merchant_id', $merchant->id)
                ->whereMonth('user_offers.created_at', $d[1])
                ->whereYear('user_offers.created_at', $d[0])
                ->groupBy('offer_id')
                ->orderBy('count', 'DESC')
                ->get();
        }
        elseif($this->date == "allTimes" && $this->branch != "allBranches"){
            $usedOffers = DB::table('user_offers')
                ->select('name','offer_id','type_id', DB::raw('count(*) as count'))
                ->join('offers', 'offers.id', '=', 'user_offers.offer_id')
                ->where('offers.merchant_id', $merchant->id)
                ->where('user_offers.branch_id', $this->branch)
                ->groupBy('offer_id')
                ->orderBy('count', 'DESC')
                ->get();
        }
        else{
            $usedOffers = DB::table('user_offers')
                ->select('name','offer_id','type_id', DB::raw('count(*) as count'))
                ->join('offers', 'offers.id', '=', 'user_offers.offer_id')
                ->where('offers.merchant_id', $merchant->id)
                ->where('user_offers.branch_id', $this->branch)
                ->whereMonth('user_offers.created_at', $d[1])
                ->whereYear('user_offers.created_at', $d[0])
                ->groupBy('offer_id')
                ->orderBy('count', 'DESC')
                ->get();
        }

        return $usedOffers;
    }

    public function totalOffers($d){
        if(Auth::user()->role_id == 2) {
            $merchant = Merchant::where('user_id', Auth::user()->id)->first();

        }else if(Auth::user()->role_id == 3 && Session::get('view_as_merchant') == true){
            $merchant = Merchant::findOrFail(Session::get('admin_view_merchant_id'));
        }else{
            throw new UnauthorizedException();
        }

        if($this->date == "allTimes" && $this->branch == "allBranches"){
            $totalOffers = DB::table('user_offers')
                    ->select('name', DB::raw('count(*) as count'))
                    ->join('offers', 'offers.id', '=', 'user_offers.offer_id')
                    ->where('offers.merchant_id', $merchant->id)
                    ->count();
        }
        elseif($this->date != "allTimes" && $this->branch == "allBranches"){
            $totalOffers = DB::table('user_offers')
                ->select('name', DB::raw('count(*) as count'))
                ->join('offers', 'offers.id', '=', 'user_offers.offer_id')
                ->where('offers.merchant_id', $merchant->id)
                ->whereMonth('user_offers.created_at', $d[1])
                ->whereYear('user_offers.created_at', $d[0])
                ->count();
        }
        elseif($this->date == "allTimes" && $this->branch != "allBranches"){
            $totalOffers = DB::table('user_offers')
                ->select('name', DB::raw('count(*) as count'))
                ->join('offers', 'offers.id', '=', 'user_offers.offer_id')
                ->where('offers.merchant_id', $merchant->id)
                ->where('user_offers.branch_id', $this->branch)
                ->count();
        }
        else{
            $totalOffers = DB::table('user_offers')
                ->select('name', DB::raw('count(*) as count'))
                ->join('offers', 'offers.id', '=', 'user_offers.offer_id')
                ->where('offers.merchant_id', $merchant->id)
                ->where('user_offers.branch_id', $this->branch)
                ->whereMonth('user_offers.created_at', $d[1])
                ->whereYear('user_offers.created_at', $d[0])
                ->count();
        }

        return $totalOffers;
    }

    public function totalCustomerNumber($d){

        if(Auth::user()->role_id == 2) {
            $merchant = Merchant::where('user_id', Auth::user()->id)->first();

        }else if(Auth::user()->role_id == 3 && Session::get('view_as_merchant') == true){
            $merchant = Merchant::findOrFail(Session::get('admin_view_merchant_id'));
        }else{
            throw new UnauthorizedException();
        }

        if($this->date == "allTimes" && $this->branch == "allBranches"){
            $totalCustomerNumber = DB::table('user_offers')
                    ->select('user_id', DB::raw('count(*) as count'))
                    ->join('offers', 'offers.id', '=', 'user_offers.offer_id')
                    ->where('offers.merchant_id', $merchant->id)
                    ->groupBy('user_id')
                    ->having('count', '>', 0)
                    ->count();
        }
        elseif($this->date != "allTimes" && $this->branch == "allBranches"){
            $totalCustomerNumber = DB::table('user_offers')
                ->select('user_id', DB::raw('count(*) as count'))
                ->join('offers', 'offers.id', '=', 'user_offers.offer_id')
                ->where('offers.merchant_id', $merchant->id)
                ->whereMonth('user_offers.created_at', $d[1])
                ->whereYear('user_offers.created_at', $d[0])
                ->groupBy('user_id')
                ->having('count', '>', 0)
                ->count();
        }
        elseif($this->date == "allTimes" && $this->branch != "allBranches"){
            $totalCustomerNumber = DB::table('user_offers')
                ->select('user_id', DB::raw('count(*) as count'))
                ->join('offers', 'offers.id', '=', 'user_offers.offer_id')
                ->where('offers.merchant_id', $merchant->id)
                ->where('user_offers.branch_id', $this->branch)
                ->groupBy('user_id')
                ->having('count', '>', 0)
                ->count();
        }
        else{
            $totalCustomerNumber = DB::table('user_offers')
                ->select('user_id', DB::raw('count(*) as count'))
                ->join('offers', 'offers.id', '=', 'user_offers.offer_id')
                ->where('offers.merchant_id', $merchant->id)
                ->where('user_offers.branch_id', $this->branch)
                ->whereMonth('user_offers.created_at', $d[1])
                ->whereYear('user_offers.created_at', $d[0])
                ->groupBy('user_id')
                ->having('count', '>', 0)
                ->count();
        }

        return $totalCustomerNumber;
    }

    public function offerTypes(){

        $offerTypes = OfferType::all();

        return $offerTypes;
    }

    public function bestSellingOffer($d){
        if(Auth::user()->role_id == 2) {
            $merchant = Merchant::where('user_id', Auth::user()->id)->first();

        }else if(Auth::user()->role_id == 3 && Session::get('view_as_merchant') == true){
            $merchant = Merchant::findOrFail(Session::get('admin_view_merchant_id'));
        }else{
            throw new UnauthorizedException();
        }

        if($this->date == "allTimes" && $this->branch == "allBranches"){
            $bestSellingOffer = DB::table('user_offers')
                ->select('name','offer_id', DB::raw('count(*) as total'))
                ->join('offers', 'offers.id', '=', 'user_offers.offer_id')
                ->where('offers.merchant_id', $merchant->id)
                ->groupBy('offer_id')
                ->orderBy('total', 'DESC')
                ->limit(1)
                ->get();
        }
        elseif($this->date != "allTimes" && $this->branch == "allBranches"){
            $bestSellingOffer = DB::table('user_offers')
                ->select('name','offer_id', DB::raw('count(*) as total'))
                ->join('offers', 'offers.id', '=', 'user_offers.offer_id')
                ->where('offers.merchant_id', $merchant->id)
                ->whereMonth('user_offers.created_at', $d[1])
                ->whereYear('user_offers.created_at', $d[0])
                ->groupBy('offer_id')
                ->orderBy('total', 'DESC')
                ->limit(1)
                ->get();
        }
        elseif($this->date == "allTimes" && $this->branch != "allBranches"){
            $bestSellingOffer = DB::table('user_offers')
                ->select('name','offer_id', DB::raw('count(*) as total'))
                ->join('offers', 'offers.id', '=', 'user_offers.offer_id')
                ->where('offers.merchant_id', $merchant->id)
                ->where('user_offers.branch_id', $this->branch)
                ->groupBy('offer_id')
                ->orderBy('total', 'DESC')
                ->limit(1)
                ->get();
        }
        else{
            $bestSellingOffer = DB::table('user_offers')
                ->select('name','offer_id', DB::raw('count(*) as total'))
                ->join('offers', 'offers.id', '=', 'user_offers.offer_id')
                ->where('offers.merchant_id', $merchant->id)
                ->where('user_offers.branch_id', $this->branch)
                ->whereMonth('user_offers.created_at', $d[1])
                ->whereYear('user_offers.created_at', $d[0])
                ->groupBy('offer_id')
                ->orderBy('total', 'DESC')
                ->limit(1)
                ->get();
        }

        return $bestSellingOffer;
    }

    public function lowestSellingOffer($d){
        if(Auth::user()->role_id == 2) {
            $merchant = Merchant::where('user_id', Auth::user()->id)->first();

        }else if(Auth::user()->role_id == 3 && Session::get('view_as_merchant') == true){
            $merchant = Merchant::findOrFail(Session::get('admin_view_merchant_id'));
        }else{
            throw new UnauthorizedException();
        }

        if($this->date == "allTimes" && $this->branch == "allBranches"){
            $lowestSellingOffer = DB::table('user_offers')
            ->select('name','offer_id', DB::raw('count(*) as total'))
            ->join('offers', 'offers.id', '=', 'user_offers.offer_id')
            ->where('offers.merchant_id', $merchant->id)
            ->groupBy('offer_id')
            ->orderBy('total', 'ASC')
            ->limit(1)
            ->get();
        }
        elseif($this->date != "allTimes" && $this->branch == "allBranches"){
            $lowestSellingOffer = DB::table('user_offers')
            ->select('name','offer_id', DB::raw('count(*) as total'))
            ->join('offers', 'offers.id', '=', 'user_offers.offer_id')
            ->where('offers.merchant_id', $merchant->id)
            ->whereMonth('user_offers.created_at', $d[1])
            ->whereYear('user_offers.created_at', $d[0])
            ->groupBy('offer_id')
            ->orderBy('total', 'ASC')
            ->limit(1)
            ->get();
        }
        elseif($this->date == "allTimes" && $this->branch != "allBranches"){
            $lowestSellingOffer = DB::table('user_offers')
            ->select('name','offer_id', DB::raw('count(*) as total'))
            ->join('offers', 'offers.id', '=', 'user_offers.offer_id')
            ->where('offers.merchant_id', $merchant->id)
            ->where('user_offers.branch_id', $this->branch)
            ->groupBy('offer_id')
            ->orderBy('total', 'ASC')
            ->limit(1)
            ->get();
        }
        else{
            $lowestSellingOffer = DB::table('user_offers')
            ->select('name','offer_id', DB::raw('count(*) as total'))
            ->join('offers', 'offers.id', '=', 'user_offers.offer_id')
            ->where('offers.merchant_id', $merchant->id)
            ->where('user_offers.branch_id', $this->branch)
            ->whereMonth('user_offers.created_at', $d[1])
            ->whereYear('user_offers.created_at', $d[0])
            ->groupBy('offer_id')
            ->orderBy('total', 'ASC')
            ->limit(1)
            ->get();
        }

        return $lowestSellingOffer;
    }
}
