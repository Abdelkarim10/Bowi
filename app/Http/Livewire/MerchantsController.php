<?php

namespace App\Http\Livewire;

use App\Models\Merchant;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Livewire\Component;

class MerchantsController extends Component
{
    public $merchants;
    public $showActivated = true;
    public $showDeactivated = false;

    public function showActivated()
    {
        $this->showActivated =true;
        $this->showDeactivated = false;
    }

    public function showDeactivated()
    {
        $this->showActivated =false;
        $this->showDeactivated = true;
    }

    public function mount()
    {
        $this->merchants = Merchant::all();
    }

    public function render()
    {
        return view('livewire.merchants-controller');
    }

    public function accept($id)
    {
        User::create([
            'name' => Merchant::find($id)->first_name . ' ' . Merchant::find($id)->last_name,
            'email' => Merchant::find($id)->email, 
            'password' => Hash::make(Str::random(10)),
            'phone_number'=>Merchant::find($id)->phone_number,
            'role_id'=>2,
            'country_id'=>Merchant::find($id)->country_id,
            'city'=>Merchant::find($id)->city,
            'address'=>Merchant::find($id)->address,
            'zipcode'=>Merchant::find($id)->zipcode,
            'activated'=>1
        ]);
        Merchant::find($id)->update([
            'accepted' => '1',
            'user_id' => User::where('email', Merchant::find($id)->email)->first()->id
        ]);
        
        $this->mount();
    }

    public function decline($id)
    {
        Merchant::find($id)->update([
            'accepted' => '0'
        ]);

        $this->mount();
    }

    public function activate($id)
    {
        Merchant::find($id)->update([
            'activated' => '1'
        ]);

        $this->mount();
    }
    public function deactivate($id)
    {
        Merchant::find($id)->update([
            'activated' => '0'
        ]);

        $this->mount();
    }
    public function makeTopRated($id)
    {
        Merchant::find($id)->update([
            'top_rated' => true
        ]);

        $this->mount();
    }
    public function removeTopRated($id)
    {
        Merchant::find($id)->update([
            'top_rated' => false
        ]);

        $this->mount();
    }
}
