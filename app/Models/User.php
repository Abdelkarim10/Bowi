<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];
    protected $dates = ['plan_expiry_date'];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    public function offer()
    {
        return $this->haveMany(Offer::class);
    }


    public function savedOffer()
    {
        return $this->haveOne(SavedOffer::class);
    }

    public function userNotification()
    {
        return $this->haveOne(UserNotification::class);
    }

    public function merchant()
    {
        return $this->hasOne(Merchant::class);
    }

    public function userOffer()
    {
        return $this->haveOne(UserOffer::class);
    }
}
