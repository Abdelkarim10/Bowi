<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeSection extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function merchants()
    {
        return $this->belongsTo(Merchant::class, "merchant_id");
    }

    public function merchantSubCategory()
    {
        return $this->belongsTo(MerchantSubCategory::class, "merchant_sub_category_id");
    }

    public function offers()
    {
        return $this->belongsTo(Offer::class, "offer_id");
    }

    public function offerType()
    {
        return $this->belongsTo(OfferType::class, "offer_type_id");
    }
}
