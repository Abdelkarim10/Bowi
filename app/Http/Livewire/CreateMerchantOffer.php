<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CreateMerchantOffer extends Component
{
    public $offertypes;
    public $products;
    public $offer;
    public $offersCount;

    public $showProduct2 = false;
    public $showDiscount = false;

    public $showProduct21 = false;
    public $showDiscount1 = false;

    public $showProduct22 = false;
    public $showDiscount2 = false;

    public function render()
    {
        if ($this->offer) {

            if ($this->offer->type_id == 1) {
                $this->showProduct2();
            } elseif ($this->offer->type_id == 2) {
                $this->showDiscount();
            }

            if ($this->offer->type_id1 == 1) {
                $this->showProduct21();
            } elseif ($this->offer->type_id1 == 2) {
                $this->showDiscount1();
            }

            if ($this->offer->type_id2 == 1) {
                $this->showProduct22();
            } elseif ($this->offer->type_id2 == 2) {
                $this->showDiscount2();
            }
        }
        return view('livewire.create-merchant-offer');
    }

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


    public function showProduct21()
    {
        $this->showProduct21 = true;
        $this->showDiscount1 = false;
    }

    public function showDiscount1()
    {
        $this->showProduct21 = false;
        $this->showDiscount1 = true;
    }


    public function showProduct22()
    {
        $this->showProduct22 = true;
        $this->showDiscount2 = false;
    }

    public function showDiscount2()
    {
        $this->showProduct22 = false;
        $this->showDiscount2 = true;
    }
}
