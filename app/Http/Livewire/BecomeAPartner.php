<?php

namespace App\Http\Livewire;

use App\Models\MerchantCategory;
use App\Models\MerchantSubCategory;
use Livewire\Component;

class BecomeAPartner extends Component
{
    public $categories;
    public $categoryId;
    public $subCategories;

    public $hearAboutUs;

    public function mount()
    {
        $this->categories = MerchantCategory::all();
        $this->getSubCategories();
    }

    public function updatedCategoryId(){
        $this->getSubCategories();
    }

    public function getSubCategories(){
        if($this->categoryId != '') {
            $this->subCategories = MerchantSubCategory::where('category_id', $this->categoryId)->get();
        }
        else{
            $this->subCategories = [];
        }
    }

    public function render()
    {
        return view('livewire.become-a-partner');
    }
}
