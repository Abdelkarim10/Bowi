<?php

namespace Database\Seeders;

use App\Models\MerchantSubCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MerchantSubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $merchanstsubcategory = [
            [
                //1
                'name' => "subcat1",
                'category_id'=> 1,
                "image" => "drink.png",
                "count" => 200,
            ],

            [
                //2
                'name' => "subcat2",
                'category_id'=> 1,
                "image" => "drink.png",
                "count" => 2001,
            ],

            [
                //3
                'name' => "subcat3",
                'category_id'=> 1,
                "image" => "drink.png",
                "count" => 2002,
            ],

            [
                //4
                'name' => "subcat4",
                'category_id'=> 1,
                "image" => "drink.png",
                "count" => 2003,
            ],

            [
                //5
                'name' => "subcat5",
                'category_id'=> 1,
                "image" => "drink.png",
                "count" => 2004,
            ],

            [
                //6
                'name' => "subcat6",
                'category_id'=> 2,
                "image" => "salad.png",
                "count" => 2005,
            ],
                
            [
                //7
                'name' => "subcat7",
                'category_id'=> 2,
                "image" => "salad.png",
                "count" => 2006,
            ],

            [
                //8
                'name' => "subcat8",
                'category_id'=> 2,
                "image" => "salad.png",
                "count" => 2007,
            ],

            [
                //9
                'name' => "subcat9",
                'category_id'=> 2,
                "image" => "salad.png",
                "count" => 2008,
            ],

            [
                //10
                'name' => "subcat10",
                'category_id'=> 2,
                "image" => "salad.png",
                "count" => 2009,
            ],

            [
                //11
                'name' => "subcat11",
                'category_id'=> 2,
                "image" => "salad.png",
                "count" => 2010,
            ],

            [
                //12
                'name' => "subcat12",
                'category_id'=> 2,
                "image" => "salad.png",
                "count" => 2011,
            ],

            [
                //13
                'name' => "subcat13",
                'category_id'=> 2,
                "image" => "salad.png",
                "count" => 2012,
            ],

            [
                //14
                'name' => "subcat14",
                'category_id'=> 2,
                "image" => "salad.png",
                "count" => 2013,
            ],

            [
                //15
                'name' => "subcat15",
                'category_id'=> 2,
                "image" => "salad.png",
                "count" => 2014,
            ],
        ];
        MerchantSubCategory::insert($merchanstsubcategory);
    }
}
