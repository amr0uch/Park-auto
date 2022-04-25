<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntretienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entretien', function (Blueprint $table) {
            $table->id();
            $table->foreignId('car_id')->references('id')->on('cars')->onDelete('cascade');
            $table->foreignId('alert_id')->references('id')->on('alerts')->onDelete('cascade');
            $table->date('date');
            $table->string('km');
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
        Schema::dropIfExists('entretien');
    }
}
