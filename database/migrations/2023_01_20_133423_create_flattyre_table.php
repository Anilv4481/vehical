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
        Schema::create('flattyre', function (Blueprint $table) {
            $table->increments('flat_tyre_id');
            $table->string('vehical_type');
            $table->string('tube');
            $table->string('tyre_size');
            $table->string('tyre_photo');
            $table->string('vehical_no');
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
        Schema::dropIfExists('flattyre');
    }
};
