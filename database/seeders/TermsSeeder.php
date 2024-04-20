<?php

namespace Database\Seeders;

use App\Models\Terms;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TermsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $terms = [
            [
                //1
                'title' => "title1",
                'term' => '1- some text some text some text some text some text some text some text some111 text some text some text some text some text some text some text some text some text some3333 text some text some text some text some text some text some text some text some text some text some text some text some tex2222t some text some text some text some text some text some text some text5555',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],

            [
                //2
                'title' => "title2",
                'term' => '2- some text some text some text some text some text some text some text some111 text some text some text some text some text some text some text some text some text some3333 text some text some text some text some text some text some text some text some text some text some text some text some tex2222t some text some text some text some text some text some text some text5555',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                //3
                'title' => "title3",
                'term' => '3- some text some text some text some text some text some text some text some111 text some text some text some text some text some text some text some text some text some3333 text some text some text some text some text some text some text some text some text some text some text some text some tex2222t some text some text some text some text some text some text some text5555',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                //4
                'title' => " title4",
                'term' => '4- some text some text some text some text some text some text some text some111 text some text some text some text some text some text some text some text some text some3333 text some text some text some text some text some text some text some text some text some text some text some text some tex2222t some text some text some text some text some text some text some text5555',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
        ];
        Terms::insert($terms);
    }
}
