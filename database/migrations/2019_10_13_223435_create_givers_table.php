<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGiversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('givers', function (Blueprint $table) {
            $table->bigIncrements('giver_id');
            $table->timestamps();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('company_name');
            $table->bigInteger('company_cuit');
            $table->bigInteger('company_phone');
            $table->string('address_street');
            $table->bigInteger('address_number');
            $table->bigInteger('address_floor')->nullable()->default(NULL);
            $table->string('address_apartment')->nullable()->default(NULL);
            $table->bigInteger('neighborhood_id')->unsigned();
            $table->foreign('neighborhood_id')->references('neighborhood_id')->on('neighborhoods');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('givers');
    }
}
