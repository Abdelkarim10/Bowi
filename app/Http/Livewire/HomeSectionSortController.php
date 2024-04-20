<?php

namespace App\Http\Livewire;

use App\Models\HomeSection;
use Livewire\Component;

class HomeSectionSortController extends Component
{
    public $homesections;

    public $showButtons = false;

    public function showOrder()
    {
        if($this->showButtons == false)
        {
            $this->showButtons = true;
        }
        else
        {
            $this->showButtons = false;
        }
    }

    public function render()
    {
        return view('livewire.home-section-sort-controller');
    }

    public function mount()
    {
        $this->homesections = HomeSection::orderBy('position')->get();
    }

    public function upOrder($id)
    {
        $homeSection = HomeSection::find($id);
        $previousHomeSection = HomeSection::where('position', '<', $homeSection->position)->orderBy('position', 'desc')->first();
        if ($previousHomeSection) {
            $previousHomeSection->update(['position' => $homeSection->position]);
            $homeSection->update(['position' => $previousHomeSection->position-1]);
        }
        $this->mount();
    }
    public function downOrder($id)
    {
        $homeSection = HomeSection::find($id);
        $nextHomeSection = HomeSection::where('position', '>', $homeSection->position)->orderBy('position', 'asc')->first();
        if ($nextHomeSection) {
            $nextHomeSection->update(['position' => $homeSection->position]);
            $homeSection->update(['position' => $nextHomeSection->position+1]);
        }
        $this->mount();
    }

    public function delete($id)
    {
        $h = HomeSection::find($id);
        foreach (HomeSection::all() as $homeSection) {
            //decrement position of all homeSections after the deleted one
            if ($homeSection->position > $h->position) {
                $homeSection->position--;
                $homeSection->save();
            }
        }
        //delete image from storage
        if($h->image !=null){
            unlink(storage_path('app/public/'.$h->image));
        }

        HomeSection::find($id)->delete();
        $this->mount();
    }
}
