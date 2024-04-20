<?php

namespace App\Http\Livewire;

use Livewire\Component;

class EditMerchantOffer extends Component
{
    public $offertypes;
    public $products;
    public $offer;
    public $offersCount;
    
    public $showProduct2 = false;
    public $showDiscount = false;
    
    public function showProduct2()
    {
        $this->showProduct2 = true;
        $this->showDiscount = false;
    }

    public function showDiscount()
    {
        $this->showProduct2 = false;
        $this->showDiscount = true;
    }
    
    public function render()
    {
        return view('livewire.edit-merchant-offer');
    }
}
