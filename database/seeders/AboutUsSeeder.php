<?php

namespace Database\Seeders;

use App\Models\AboutUs;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $aboutus = [
            [
                //1
                'title' => "title1",
                'content' => '1- some text some text some text some text some text some text some text some111 text some text some text some text some text some text some text some text some text some3333 text some text some text some text some text some text some text some text some text some text some text some text some tex2222t some text some text some text some text some text some text some text5555',
                'pic'=> '/images/aboutus.jpg',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],

            [
                //2
                'title' => "title2",
                'content' => '2- some text some text some text some text some text some text some text some111 text some text some text some text some text some text some text some text some text some3333 text some text some text some text some text some text some text some text some text some text some text some text some tex2222t some text some text some text some text some text some text some text5555',
                'pic'=> '/images/aboutus.jpg',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                //3
                'title' => "title3",
                'content' => '3- some text some text some text some text some text some text some text some111 text some text some text some text some text some text some text some text some text some3333 text some text some text some text some text some text some text some text some text some text some text some text some tex2222t some text some text some text some text some text some text some text5555',
                'pic'=> '/images/aboutus.jpg',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                //4
                'title' => " title4",
                'content' => '4- some text some text some text some text some text some text some text some111 text some text some text some text some text some text some text some text some text some3333 text some text some text some text some text some text some text some text some text some text some text some text some tex2222t some text some text some text some text some text some text some text5555',
                'pic'=> '/images/aboutus.jpg',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
        ];
        AboutUs::insert($aboutus);
    }
}
