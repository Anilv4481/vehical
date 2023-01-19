<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
     /*
     * Run the migrations.
     *
     * @return void
     */
    
    public function up()
    {
        Schema::create('managehostelservice', function (Blueprint $table) {
            $table->increments('pet_id');
            $table->string('opening_time');
            $table->string('closing_time');
            $table->string('pet_type');
            $table->string('pet_per_hour');
            $table->string('pet_per_day');
            $table->string('pet_seat');
            $table->string('pet_desc');
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
        Schema::dropIfExists('managehostelservice');
    }
};