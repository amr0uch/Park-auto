<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_client')->references('id')->on('clients')->onDelete('cascade');
            $table->foreignId('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('id_car')->references('id')->on('cars')->onDelete('cascade');
            $table->date('debut_contract');
            $table->date('end_contract');           
            $table->string('amount');
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
        Schema::dropIfExists('contracts');
    }
}
