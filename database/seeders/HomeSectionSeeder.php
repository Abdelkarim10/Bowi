<?php

namespace Database\Seeders;

use App\Models\HomeSection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HomeSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $HomeSection = [
            [
                //1
                'type' => "ad",
                'title' => null,
                'merchant_id' => 2,
                'merchant_sub_category_id' => null,
                'offer_id' => null,
                'offer_type_id' => null,
                'position' => 1,
                'image' => "https://www.foodandwine.com/thmb/taMB2JzkagHAPDB5UCtRe7tLqXU=/1600x1200/filters:fill(auto,1)/hatch-chile-smash-burgers-FT-seo-RECIPE0719_0-183c980af99541528d6cfa7f40ca2c21.jpg"
            ],
            [
                //1
                'type' => "ad",
                'title' => null,
                'merchant_id' => 1,
                'merchant_sub_category_id' => null,
                'offer_id' => null,
                'offer_type_id' => null,
                'position' => 2,
                'image' => "https://www.foodandwine.com/thmb/taMB2JzkagHAPDB5UCtRe7tLqXU=/1600x1200/filters:fill(auto,1)/hatch-chile-smash-burgers-FT-seo-RECIPE0719_0-183c980af99541528d6cfa7f40ca2c21.jpg"
            ],
            [
                //2
                'type' => "ad",
                'title' => null,
                'merchant_id' => null,
                'merchant_sub_category_id' => null,
                'offer_id' => 2,
                'offer_type_id' => null,
                'position' => 3,
                'image' => "https://www.foodandwine.com/thmb/taMB2JzkagHAPDB5UCtRe7tLqXU=/1600x1200/filters:fill(auto,1)/hatch-chile-smash-burgers-FT-seo-RECIPE0719_0-183c980af99541528d6cfa7f40ca2c21.jpg"
            ],
            [
                //3
                'type' => "offers",
                'title' => "Offers title1",
                'merchant_id' => null,
                'merchant_sub_category_id' => null,
                'offer_id' => null,
                'offer_type_id' => 1,
                'position' => 4,
                'image' => null
            ],
            [
                //4
                'type' => "merchants",
                'title' => "Merchants title1",
                'merchant_id' => null,
                'merchant_sub_category_id' => 1,
                'offer_id' => null,
                'offer_type_id' => null,
                'position' => 5,
                'image' => null
            ],
            [
                //5
                'type' => "collaboration",
                'title' => 'Collaboration title',
                'merchant_id' => 1,
                'merchant_sub_category_id' => null,
                'offer_id' => null,
                'offer_type_id' => null,
                'position' => 6,
                'image' => null
            ],
        ];
        HomeSection::insert($HomeSection);
    }
}
