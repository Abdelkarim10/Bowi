<?php

namespace Database\Seeders;

use App\Models\ContactUs;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $m = [
            [
                'id' => 1,
                'name' => 'John Doe',
                'email' => 'jhon@mail.com',
                'title' => 'Test',
                'message' => 'To make your document look professionally produced, Word provides header, footer, cover page, and text box designs that complement each other. For example, you can add a matching cover page, header, and sidebar. Click Insert and then choose the elements you want from the different galleries.',
                'created_at' => '2021-05-01 00:00:00',
                'updated_at' => '2021-05-01 00:00:00',
            ],
        ];
        ContactUs::insert($m);
    }
}
