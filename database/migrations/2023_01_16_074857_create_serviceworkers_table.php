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
        Schema::create('serviceworkers', function (Blueprint $table) {
            $table->increments('service_worker_id');
            $table->string('service_worker_name');
            $table->string('service_worker_status');
            $table->string('service_worker_profile');
            $table->string('service_worker_active');
            $table->string('service_worker_shop_name');
            $table->string('service_worker_phone');
            $table->string('longitude');
            $table->string('latitude');
            $table->string('service_worker_email_id');
            $table->string('service_worker_last_location');
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
        Schema::dropIfExists('serviceworkers');
    }
};
