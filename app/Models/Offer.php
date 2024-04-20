<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $guarded = [];
    public $timestamps = true;
    protected $dates = ['expired_date'];

    public function offers()
    {
        return $this->belongsTo(Offer::class);
    }

    public function merchants()
    {
        return $this->belongsTo(Merchant::class, "merchant_id");
    }

    public function type()
    {
        return $this->belongsTo(OfferType::class, "type_id");
    }

    public function product1()
    {
        return $this->belongsTo(Product::class, "product1_id");
    }

    public function product2()
    {
        return $this->belongsTo(Product::class, "product2_id");
    }

    public function userOffer()
    {
        return $this->hasMany(UserOffer::class);
    }

    public function savedOffers()
    {
        return $this->hasMany(SavedOffer::class);
    }

    public function homeSections()
    {
        return $this->hasMany(HomeSection::class);
    }
}
