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
        Schema::create('shopregistrations', function (Blueprint $table) {
            $table->increments('shop_registration_id');
            $table->string('company_name');
            $table->string('company_gst_no');
            $table->string('company_owner_name');
            $table->string('company_address');
            $table->string('company_email');
            $table->string('company_mobile');
            $table->string('company_year_of_exp');
            $table->string('company_aboutus');
            $table->string('company_password');
            $table->string('company_c_password');
            $table->string('company_work_place_photo');
            $table->string('company_profile_image');
            $table->string('company_location');
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
        Schema::dropIfExists('shopregistrations');
    }
};
