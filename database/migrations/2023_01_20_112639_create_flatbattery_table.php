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
        Schema::create('flatbattery', function (Blueprint $table) {
            $table->increments('flat_battery_id');
            $table->string('vehical_type');
            $table->string('vehical_no');
            $table->string('vehical_pic');
            $table->string('battery_pic');
            $table->string('location');
            $table->string('descrption');
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
        Schema::dropIfExists('flatbattery');
    }
};
