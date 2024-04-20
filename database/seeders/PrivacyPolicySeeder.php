<?php

namespace Database\Seeders;

use App\Models\PrivacyPolicy;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PrivacyPolicySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $PP = [
            [
                //1
                'title' => "title1",
                'text' => '1- some text some text some text some text some text some text some text some111 text some text some text some text some text some text some text some text some text some3333 text some text some text some text some text some text some text some text some text some text some text some text some tex2222t some text some text some text some text some text some text some text5555',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],

            [
                //2
                'title' => "title2",
                'text' => '2- some text some text some text some text some text some text some text some111 text some text some text some text some text some text some text some text some text some3333 text some text some text some text some text some text some text some text some text some text some text some text some tex2222t some text some text some text some text some text some text some text5555',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                //3
                'title' => "title3",
                'text' => '3- some text some text some text some text some text some text some text some111 text some text some text some text some text some text some text some text some text some3333 text some text some text some text some text some text some text some text some text some text some text some text some tex2222t some text some text some text some text some text some text some text5555',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                //4
                'title' => " title4",
                'text' => '4- some text some text some text some text some text some text some text some111 text some text some text some text some text some text some text some text some text some3333 text some text some text some text some text some text some text some text some text some text some text some text some tex2222t some text some text some text some text some text some text some text5555',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
        ];
        PrivacyPolicy::insert($PP);
    }
}
