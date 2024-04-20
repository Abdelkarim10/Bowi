<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MediaAssetsController extends Component
{
    public $Images;

    public $showFirst = true;
    public $showSecond = false;
    public $showThird = false;

    public function showFirst()
    {
        $this->showFirst =true;
        $this->showSecond = false;
        $this->showThird = false;
    }

    public function showSecond()
    {
        $this->showFirst =false;
        $this->showSecond = true;
        $this->showThird = false;
    }

    public function showThird()
    {
        $this->showFirst =false;
        $this->showSecond = false;
        $this->showThird = true;
    }

    public function render()
    {
        return view('livewire.media-assets-controller');
    }
}
