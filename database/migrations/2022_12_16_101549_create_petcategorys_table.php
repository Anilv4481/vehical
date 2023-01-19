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
        Schema::create('petcategorys', function (Blueprint $table) {
            $table->bigIncrements('category_id');
            $table->string('pet_category_name');
            $table->string('category_no_seats');
            $table->string('category_hostel_id');
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
        Schema::dropIfExists('petcategorys');
    }
};
