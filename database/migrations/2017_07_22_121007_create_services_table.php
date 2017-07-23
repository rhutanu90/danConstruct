<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('SERVICES', function (Blueprint $table) {
            $table->increments('ID_SERVICE');
            $table->string('SERVICE_NAME');
            $table->float('ESTIMATED_PRICE', 8 , 2)->nullable();
            $table->integer('ESTIMATED_DURATION')->nullable();
            $table->string('SERVICE_COLOR')->nullable();
            $table->string('SERVICE_DESCRIPTION')->nullable();
            $table->integer('CREATED_USER_ID');
            $table->tinyInteger('DELETED');
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
        Schema::dropIfExists('SERVICES');
    }
}
