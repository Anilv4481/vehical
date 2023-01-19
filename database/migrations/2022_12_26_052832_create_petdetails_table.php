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
        Schema::create('petdetails', function (Blueprint $table) {
            $table->increments('pet_id');
            $table->string('pet_type');
            $table->string('pet_breed');
            $table->string('pet_year');
            $table->string('pet_month');
            $table->string('pet_gender');
            $table->string('pet_height');
            $table->string('pet_weight');
            $table->string('pet_image');
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
        Schema::dropIfExists('petdetails');
    }
};
