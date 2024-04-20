<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestForEdit extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = true;

    public function merchant()
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
}
