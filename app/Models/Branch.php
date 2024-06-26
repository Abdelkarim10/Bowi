<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function merchant()
    {
        return $this->belongsTo(Merchant::class);
    }

    public function userOffer(){
        return $this->hasMany(UserOffer::class);
    }
}
