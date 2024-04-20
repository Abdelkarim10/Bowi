<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MerchantSubCategory extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = false;


    public function merchant()
    {
        return $this->hasOne(Merchant::class);
    }

    public function category()
    {
        return $this->hasOne(MerchantCategory::class, "category_id");
    }

    public function homeSection()
    {
        return $this->hasOne(HomeSection::class);
    }
}
