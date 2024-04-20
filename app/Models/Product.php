<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];
    public $timestamps = true;

    public function branch()
    {
        return $this->hasOne(Branch::class);
    }

    public function productCategory()
    {
        return $this->belongsTo(ProductCategory::class);
    }

    public function merchant()
    {
        return $this->belongsTo(Merchant::class);
    }

    public function offer()
    {
        return $this->haveMany(Offer::class);
    }

    public function requestForEdit()
    {
        return $this->haveMany(RequestForEdit::class);
    }
}
