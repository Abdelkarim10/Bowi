<?php

namespace App\Http\Livewire;

use App\Models\Branch;
use App\Models\Merchant;
use App\Models\UserOffer;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class RedeemCode extends Component
{
    public $code;
    public $details;
    public $branch_id;

    public function DBBranches(){
        if(Auth::user()->role_id == 2) {
            $merchant = Auth::user()->merchant;

        }else if(Auth::user()->role_id == 3 && Session::get('view_as_merchant') == true){
            $merchant = Merchant::findOrFail(Session::get('admin_view_merchant_id'));
        }else{
            throw new UnauthorizedException();
        }
        $branches = Branch::where('merchant_id', $merchant->id)->get();
        return $branches;
    }

    protected $seeDetailsVal = [
        'code' => 'required',
    ];

    public function render()
    {
        return view('livewire.redeem-code',[
            'DBBranches' => $this->DBBranches(),
        ]);
    }

    public function redeemCode()
    {

        $offerCode = UserOffer::where("code",$this->code)->where("expire_date",">",Carbon::now())->first();

        $offer_merchant = $offerCode->offer->merchants;

        if(Auth::user()->role_id == 2) {
            $user_merchant = Auth::user()->merchant;

        }else if(Auth::user()->role_id == 3 && Session::get('view_as_merchant') == true){
            $user_merchant = Merchant::findOrFail(Session::get('admin_view_merchant_id'));
        }else{
            throw new UnauthorizedException();
        }

        if($offer_merchant->id != $user_merchant->id){
            return redirect('redeem-code')->with("message1","this Code is not for this merchant");
        } else
        {
            if($offerCode == null){
                return redirect('redeem-code')->with("message1","Code is not valid");
            }
            elseif($this->branch_id == null){
                return redirect('redeem-code')->with("message1","Please select your branch");
            }else{
                if($offerCode->redeemed == true){
                    return redirect('redeem-code')->with('message1', 'Code Already Redeemed');
                }
                $offerCode->update([
                    "redeemed" => true,
                    "branch_id" => $this->branch_id,
                ]);
                return redirect('redeem-code')->with('message', 'Code Redeemed Successfully');
            }
        }
    }

    public function seeDetails()
    {
        $s = UserOffer::where("code",$this->code)->where("expire_date",">",Carbon::now())->first();
        if($s == null){
            return redirect('redeem-code')->with("message1","Code is invalid");
        }
        else{
            $offer_merchant = $s->offer->merchants;

            if(Auth::user()->role_id == 2) {
                $user_merchant = Auth::user()->merchant;

            }else if(Auth::user()->role_id == 3 && Session::get('view_as_merchant') == true){
                $user_merchant = Merchant::findOrFail(Session::get('admin_view_merchant_id'));
            }else{
                throw new UnauthorizedException();
            }

            if($offer_merchant->id != $user_merchant->id){
                return redirect('redeem-code')->with("message1","Code is invalid");
            }
            else
            {
                $this->details = $s;
            }
        }
    }
}
