<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfferType extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function offer()
    {
        return $this->haveOne(Offer::class);
    }

    public function requestForEdit()
    {
        return $this->haveOne(RequestForEdit::class);
    }

    public function homeSection()
    {
        return $this->haveOne(HomeSection::class);
    }
}
