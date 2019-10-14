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
            $table->string('company-name');
            $table->integer('company-cuit');
            $table->integer('company-phone');
            $table->string('address-street');
            $table->integer('address-number');
            $table->integer('address-floor')->nullable()->default(NULL);
            $table->string('address-apartment')->nullable()->default(NULL);
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
