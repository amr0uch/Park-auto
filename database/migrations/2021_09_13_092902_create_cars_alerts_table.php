<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsAlertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars_alerts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_car')->references('id')->on('cars')->onDelete('cascade');
            $table->foreignId('id_alert')->references('id')->on('alerts')->onDelete('cascade');
            $table->date('date');
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
        Schema::dropIfExists('cars_alerts');
    }
}
