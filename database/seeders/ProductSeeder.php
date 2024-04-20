<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                //1
                'name' => 'awwalProduct',
                'product_category_id' => 1,
                'merchant_id' => 1,
                'price' =>  750,
                'description' => 'awwalProduct',
                'picture' => 'https://www.news-medical.net/image.axd?picture=2018%2F4%2Fshutterstock_1By_stockcreations.jpg',

            ],

            [
                //2
                'name' => 'teniProduct',
                'product_category_id' => 2,
                'merchant_id' => 2,
                'price' =>  500,
                'description' => 'teniProduct',
                'picture' => 'https://www.news-medical.net/image.axd?picture=2018%2F4%2Fshutterstock_1By_stockcreations.jpg',
            ],
            [
                //3
                'name' => 'awwalProduct',
                'product_category_id' => 2,
                'merchant_id' => 2,
                'price' =>  50,
                'description' => 'teletProduct',
                'picture' => 'https://www.news-medical.net/image.axd?picture=2018%2F4%2Fshutterstock_1By_stockcreations.jpg',

            ],
            [
                //4
                'name' => 'khamesProduct',
                'product_category_id' => 2,
                'merchant_id' => 2,
                'price' =>  50,
                'description' => 'rabe3Product',
                'picture' => 'https://www.news-medical.net/image.axd?picture=2018%2F4%2Fshutterstock_1By_stockcreations.jpg',

            ]
        ];
        Product::insert($products);
    }
}
