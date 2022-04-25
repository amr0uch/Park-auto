<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_status')->references('id')->on('statuses')->onDelete('cascade');
            $table->string('registration', 191)->unique();
            $table->string('model');
            $table->string('fuel');
            $table->string('color');
            $table->integer('doors_num');
            $table->integer('passengers_num');
            $table->string('file');
            $table->string('price_day');
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
        Schema::dropIfExists('cars');
    }
}
