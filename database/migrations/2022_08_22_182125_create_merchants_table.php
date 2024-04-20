<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchants', function (Blueprint $table) {
            $table->increments('id');
            $table->string('business_name');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('city');
            $table->string('address');
            $table->string('zipcode');
            $table->string('country_code')->nullable();
            $table->string('phone_number');
            $table->foreignId('merchant_sub_category_id');
            $table->string('logo')->nullable();
            $table->boolean('accepted')->nullable();
            $table->longText('description')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->double('rate', 2, 1)->default(0.01);
            $table->boolean('top_rated')->default(false);

            $table->time('open_time')->nullable();
            $table->time('close_time')->nullable();

            $table->integer('from')->nullable();
            $table->integer('to')->nullable();
            
            $table->date('subscription')->nullable();

            $table->boolean('activated')->default(true);
            
            $table->string('hear_about_us')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('merchants');
    }
};
