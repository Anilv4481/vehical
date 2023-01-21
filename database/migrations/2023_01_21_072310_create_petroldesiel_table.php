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
        Schema::create('petroldesiel', function (Blueprint $table) {
            $table->increments('petroldesiel_id');
            $table->string('vehical_type');
            $table->string('vehical_no');
            $table->string('vehical_pic');
            $table->string('fuel_type');
            $table->string('quanity_fuel');
            $table->string('location');
            $table->string('descrpition');
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
        Schema::dropIfExists('petroldesiel');
    }
};
