<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;
    protected $table = 'product_categories';
    protected $guarded = [];


    public function branch()
    {
        return $this->belongsTo(Product::class);
    }

    public function product()
    {
        return $this->haveMany(Product::class);
    }
}
