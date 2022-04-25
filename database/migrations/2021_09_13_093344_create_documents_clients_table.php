<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_document', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_client')->references('id')->on('clients')->onDelete('cascade');
            $table->foreignId('id_document')->references('id')->on('documents')->onDelete('cascade');
            $table->text('file');
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
        Schema::dropIfExists('documents_clients');
    }
}
