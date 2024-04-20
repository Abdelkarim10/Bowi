<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserOffer extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = true;
    protected $dates = ['expire_date'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function  offer()
    {
        return $this->belongsTo(Offer::class);
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function merchant()
    {
        return $this->offer->merchants;
    }
}
