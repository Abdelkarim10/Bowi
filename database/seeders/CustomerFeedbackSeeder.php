<?php

namespace Database\Seeders;

use App\Models\CustomerFeedback;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerFeedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $custfeedback = [
            [
                //1
                'title' => "muchkila",
                'message'=> 'khls mechi lhal',
                'rating'=> '3'



            ],

            [
                //2
                'title' => "maa3lech",
                'message'=> 'waja3 ras',
                'rating'=> '2'


            ],

            [
                //3
                'title' => "maa3lech 2",
                'message'=> 'waja3 ras2',
                'rating'=> '3'


            ],

            [
                //4
                'title' => "maa3lech 4",
                'message'=> 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Esse illo laboriosam hic corporis, nobis incidunt qui debitis dolores natus quos, consequuntur tenetur. Temporibus fugit reiciendis possimus eligendi sequi similique cupiditate?',
                'rating'=> '4'


            ],

            [
                //5
                'title' => "maa3lech 5",
                'message'=> 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Esse illo laboriosam hic corporis, nobis incidunt qui debitis dolores natus quos, consequuntur tenetur. Temporibus fugit reiciendis possimus eligendi sequi similique cupiditate?',
                'rating'=> '5'


            ]
        ];
        CustomerFeedback::insert($custfeedback);
    }
}
