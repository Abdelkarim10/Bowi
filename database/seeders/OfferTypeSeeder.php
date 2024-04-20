<?php

namespace Database\Seeders;

use App\Models\OfferType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OfferTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $offerstype = [
            [
                //1
                'name' =>'Buy 1 get 1',
                'description' => 'Buy 1 get 1 description',
                
                
            ],

            [
                //2
                'name' =>'Discount',
                'description' => 'Discount description',
               
            ]
        ];
        OfferType::insert($offerstype);
    }
}
