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
        Schema::create('customertrainers', function (Blueprint $table) {
            $table->increments('trainer_id');
            $table->string('trainer_name');
            $table->string('trainer_image');
            $table->string('trainer_type');
            $table->timestamp('deleted_at');
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
        Schema::dropIfExists('customertrainers');
    }
};
