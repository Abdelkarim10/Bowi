<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MerchantCategory extends Model
{
    use HasFactory;

    protected $guarded = [];
    public $timestamps = false;

    public function subCategory()
    {
        return $this->belongsTo(MerchantSubCategory::class);
    }

    public function homeSection()
    {
        return $this->haveOne(HomeSection::class);
    }
}
