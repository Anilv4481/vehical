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
        Schema::create('doctorservices', function (Blueprint $table) {
            $table->increments('doctor_service_id');
            $table->string('doctor_service_name');
            $table->timestamp('deleted_at');
            $table->timestamps();
        });
    }

     /*
     * Reverse the migrations.
     *
     * @return void
     */

    public function down()
    {
        Schema::dropIfExists('doctorservices');
    }
};
