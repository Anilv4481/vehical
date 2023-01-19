<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
    {
        Schema::create('vehicalservices', function (Blueprint $table) {
            $table->increments('vehicalservice_id');
            $table->string('vehicalservice_name');
            $table->string('vehical_image');
            $table->timestamps();
        });
    }

  
    public function down()
    {
        Schema::dropIfExists('vehicalservices');
    }

};