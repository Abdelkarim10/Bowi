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
        Schema::create('request_for_edits', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('offer_id')->unsigned();
            $table->string('name');
            $table->String('picture')->nullable(); //maybe not nullable
            $table->foreignId('type_id');
            $table->foreignId('product1_id');
            $table->foreignId('product2_id')->nullable();
            $table->foreignId('merchant_id');
            $table->double('rate', 2, 1)->default(0.1);
            $table->boolean('top_rated')->default(false);
            $table->enum('condition', ['Dine-in', 'Takeaway']);
            $table->date('expired_date');
            $table->double('discount')->nullable();
            $table->double('estimated_saving');
            $table->text('reason');
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
        Schema::dropIfExists('request_for_edits');
    }
};
