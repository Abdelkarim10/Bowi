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
        Schema::create('home_sections', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('type', ['ad', 'offers', 'merchants','collaboration']);
            $table->String('title')->nullable();
            $table->integer('merchant_id')->nullable();
            $table->integer('merchant_sub_category_id')->nullable();
            $table->integer('offer_id')->nullable();
            $table->integer('offer_type_id')->nullable();
            $table->string('image')->nullable();
            $table->integer('position')->nullable();
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
        Schema::dropIfExists('home_sections');
    }
};
