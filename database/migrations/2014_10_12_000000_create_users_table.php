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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email', 150)->unique();
            $table->string('gender')->nullable();
            $table->string('country_code')->nullable();
            $table->string('phone_number',50)->unique();
            $table->string('profile_pic')->nullable();
            $table->integer('age')->nullable();
            $table->foreignId('role_id'); //seeder
            $table->string('region')->nullable();
            $table->string('city');
            $table->string('address');
            $table->integer('zipcode');
            $table->string('additional_information')->nullable();
            $table->string('password');
            $table->string('remember_token')->nullable();
            $table->integer('fcm_token')->nullable();
            $table->foreignId('plan_id')->nullable(); //seeder
            $table->date('plan_expiry_date')->nullable();
            $table->timestamps();
            $table->boolean('activated')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
