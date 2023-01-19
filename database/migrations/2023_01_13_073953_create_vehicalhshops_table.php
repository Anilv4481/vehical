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
        Schema::create('vehicalhshops', function (Blueprint $table) {
            $table->increments('vehical_shop_id');
            $table->string('vehical_shop_address');
            $table->string('vehical_phone_number');
            $table->string('vehical_shop_email_id');   
            $table->string('vehical_shop_status');            
            $table->string('vehical_shop_profile');
            $table->string('vehical_type');
            $table->string('vehical_problem');
            $table->string('vehical_desc');
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
        Schema::dropIfExists('vehicalhshops');
    }
};
