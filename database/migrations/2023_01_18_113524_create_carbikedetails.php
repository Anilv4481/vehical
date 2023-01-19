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
        Schema::create('carbikedetails', function (Blueprint $table) {
            $table->increments('car_bike_details_id');
            $table->string('vehical_company_name');
            $table->string('vehical_name');
            $table->string('vehical_registration_no');
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
        Schema::dropIfExists('carbikedetails');
    }
};
