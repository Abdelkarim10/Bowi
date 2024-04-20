<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaAssetsAlbums extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = false;

    public function image()
    {
        return $this->hasMany(MediaAssetsImages::class);
    }
}
