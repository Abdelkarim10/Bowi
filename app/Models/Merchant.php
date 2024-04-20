<?php

namespace App\Models;

use App\Http\Controllers\Admin\MerchantController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    protected $dates = ['subscription'];

    public function merchantOffer()
    {
        return $this->haveMany(MerhchantOffer::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function offers()
    {
        return $this->hasMany(Offer::class);
    }

    public function requestForEdit()
    {
        return $this->hasMany(RequestForEdit::class);
    }

    public function merchantSubCategory()
    {
        return $this->belongsTo(MerchantSubCategory::class, "merchant_sub_category_id");
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function homeSection()
    {
        return $this->hasOne(HomeSection::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function branches()
    {
        return $this->hasMany(Branch::class);
    }
}
