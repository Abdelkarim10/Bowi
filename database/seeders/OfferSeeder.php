<?php

namespace Database\Seeders;

use App\Models\Offer;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $offers = [
            [
                //1
                "name" => "Offer 1",
                'type_id' => 1,
                'product1_id' => 1,
                'product2_id' => 2,
                'discount' => null,
                "merchant_id" => 1,
                'rate' => 1.57,
                'top_rated' => true,
                'estimated_saving'=>10.2,
                'expired_date'=> '2022-08-22',
                'picture' => 'https://www.foodandwine.com/thmb/taMB2JzkagHAPDB5UCtRe7tLqXU=/1600x1200/filters:fill(auto,1)/hatch-chile-smash-burgers-FT-seo-RECIPE0719_0-183c980af99541528d6cfa7f40ca2c21.jpg',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')

            ],
            [
                //2
                "name" => "Offer 1.5",
                'type_id' => 1,
                'product1_id' => 1,
                'product2_id' => 2,
                'discount' => null,
                "merchant_id" => 1,
                'rate' => 4.5,
                'top_rated' => true,
                'expired_date'=> '2022-08-22',
                'estimated_saving'=>12.2,
                'picture' => 'https://www.foodandwine.com/thmb/taMB2JzkagHAPDB5UCtRe7tLqXU=/1600x1200/filters:fill(auto,1)/hatch-chile-smash-burgers-FT-seo-RECIPE0719_0-183c980af99541528d6cfa7f40ca2c21.jpg',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')

            ],

            [
                //3
                "name" => "Offer 2",
                'type_id' => 2,
                'product1_id' => 2,
                'product2_id' => null,
                'discount' =>  1.85,
                "merchant_id" => 1,
                'rate' => 1.8,
                'top_rated' => true,
                'expired_date'=> '2022-08-22',
                'estimated_saving'=>12.7,
                'picture' => 'https://www.foodandwine.com/thmb/taMB2JzkagHAPDB5UCtRe7tLqXU=/1600x1200/filters:fill(auto,1)/hatch-chile-smash-burgers-FT-seo-RECIPE0719_0-183c980af99541528d6cfa7f40ca2c21.jpg',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')

            ],
            [
                //4
                "name" => "Offer 3",
                'type_id' => 1,
                'product1_id' => 1,
                'product2_id' => 1,
                'discount' => null,
                "merchant_id" => 2,
                'rate' => 2.57,
                'top_rated' => false,
                'expired_date'=> '2022-11-22',
                'estimated_saving'=>19.7,
                'picture' => 'https://www.foodandwine.com/thmb/taMB2JzkagHAPDB5UCtRe7tLqXU=/1600x1200/filters:fill(auto,1)/hatch-chile-smash-burgers-FT-seo-RECIPE0719_0-183c980af99541528d6cfa7f40ca2c21.jpg',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')


            ],

            [
                //5
                "name" => "Offer 4",
                'type_id' => 2,
                'product1_id' => 2,
                'product2_id' => 2,
                'discount' =>  null,
                "merchant_id" => 2,
                'rate' => 3.57,
                'top_rated' => false,
                'expired_date'=> '2022-10-22',
                'estimated_saving'=>9.7,
                'picture' => 'https://www.foodandwine.com/thmb/taMB2JzkagHAPDB5UCtRe7tLqXU=/1600x1200/filters:fill(auto,1)/hatch-chile-smash-burgers-FT-seo-RECIPE0719_0-183c980af99541528d6cfa7f40ca2c21.jpg',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')

            ],
            [
                //6
                "name" => "Offer 5",
                'type_id' => 2,
                'product1_id' => 2,
                'product2_id' => null,
                'discount' =>  1.85,
                "merchant_id" => 2,
                'rate' => 4.43,
                'top_rated' => false,
                'expired_date'=> '2022-12-22',
                'estimated_saving'=>6.4,
                'picture' => 'https://www.foodandwine.com/thmb/taMB2JzkagHAPDB5UCtRe7tLqXU=/1600x1200/filters:fill(auto,1)/hatch-chile-smash-burgers-FT-seo-RECIPE0719_0-183c980af99541528d6cfa7f40ca2c21.jpg',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')

            ],
            [
                //7
                "name" => "Offer 6",
                'type_id' => 2,
                'product1_id' => 4,
                'product2_id' => null,
                'discount' =>  1.85,
                "merchant_id" => 2,
                'rate' => 4,
                'top_rated' => false,
                'expired_date'=> '2023-01-22',
                'estimated_saving'=>16.4,
                'picture' => 'https://www.foodandwine.com/thmb/taMB2JzkagHAPDB5UCtRe7tLqXU=/1600x1200/filters:fill(auto,1)/hatch-chile-smash-burgers-FT-seo-RECIPE0719_0-183c980af99541528d6cfa7f40ca2c21.jpg',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')

            ]
        ];
        Offer::insert($offers);
    }
}
