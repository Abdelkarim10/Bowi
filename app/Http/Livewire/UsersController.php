<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class UsersController extends Component
{
    public $age = 'allAges';
    public $gender = 'allGenders';
    public $countryy = 'allCountries';
    public $userStatus = 'allUsers';

    public $users;
    public $countries;
    public $plans;
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
        $this->users = User::where('role_id', '!=', 3)->get();
    }

    public function filterResult()
    {
        $d = $this->age;
        $d= preg_split("/-/",$d);

        if($this->age == 'allAges' && $this->gender == 'allGenders' && $this->countryy == 'allCountries' && $this->userStatus == 'allUsers'){
            $this->users = User::where('role_id', '!=', 3)->get();
        }
        else{
        $this->users = User::where('role_id', '!=', 3)->where('age','>',$d[0])->where('age','<',$d[1])->where('gender',$this->gender)->where('country_id',$this->countryy)->where('plan_id',$this->userStatus)->get(); 
        }
        // $this->users = User::where('gender',$this->gender)->get();
        // $this->users = User::where('country',$this->countryy)->get();
        // $this->users = User::where('status',$this->userStatus)->get();
    }

    public function render()
    {
        return view('livewire.users-controller');
    }

    public function activate($id)
    {
        User::find($id)->update([
            'activated' => '1'
        ]);

        $this->filterResult();
    }
    public function deactivate($id)
    {
        User::find($id)->update([
            'activated' => '0'
        ]);

        $this->filterResult();
    }
}
