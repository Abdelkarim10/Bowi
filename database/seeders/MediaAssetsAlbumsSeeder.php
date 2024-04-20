<?php

namespace Database\Seeders;

use App\Models\MediaAssetsAlbums;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MediaAssetsAlbumsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $a = [
            [
                //1
                'title'=>'Photo gallery',
            ],
            [
                //2
                'title'=>'In-app screenshots',
            ],
            [
                //3
                'title'=>'B-roll',
            ],
        ];
        MediaAssetsAlbums::insert($a);
    }
}
