<?php

namespace Database\Seeders;

use App\Models\MerchantCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MerchantCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $merchantsCategory = [
            [
                //1
                'name' => "cat1",
                "image" => "burger.png"



            ],

            [
                //2
                'name' => "cat2",
                "image" => "drink.png"


            ],

            [
                //4
                'name' => "cat3",
                "image" => "fruit.png"
            ],

            [
                //4
                'name' => "cat4",
                "image" => "hotdog.png"
            ],
            
            [
                //5
                'name' => "cat5",
                "image" => "kabab.png"
            ],
            
            [
                //6
                'name' => "cat6",
                "image" => "pizza.png"
            ],
        ];
        MerchantCategory::insert($merchantsCategory);
    }
}
