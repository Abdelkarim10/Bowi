<?php

namespace Database\Seeders;

use App\Models\PaymentReceived;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentReceivedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $payment = [
            [
                //1
                'amount' => 15,
              

            ],

            [
                //1
                'amount' => 25,
            ]
            ];  
            
            PaymentReceived::insert($payment);
    }
  
}
