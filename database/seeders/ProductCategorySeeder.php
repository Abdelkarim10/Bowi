<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productsCategory = [
            [
                //1
                'id' => 1,
                'name' =>'Burger',
                "image" => "burger.png"
                
            ],

            [
                //2
                'id' => 2,
                'name' =>'Croissant',
                "image" => "croisant.png"

            ]
            ,

            [
                //3
                'id' => 3,
                'name' =>'Drink',
                "image" => "drink.png"

            ],

            [
                //4
                'id' => 4,
                'name' =>'Fruit',
                "image" => "fruit.png"

            ],

            [
                //5
                'id' => 5,
                'name' =>'Hotdog',
                "image" => "hotdog.png"

            ],

            [
                //6
                'id' => 6,
                'name' =>'Kabab',
                "image" => "kabab.png"

            ],

            [
                //7
                'id' => 7,
                'name' =>'Pizza',
                "image" => "pizza.png"

            ],

            [
                //8
                'id' => 8,
                'name' =>'Salad',
                "image" => "salad.png"

            ],

            [
                //9
                'id' => 9,
                'name' =>'Taco',
                "image" => "taco.png"

            ]
        ];
        ProductCategory::insert($productsCategory);
    }
}
