<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('product_id');
            $table->timestamps();
            $table->string('name');
            $table->bigInteger('amount');
            $table->boolean('has_exp_date')->default(0);
            $table->date('exp_date')->nullable()->default(NULL);
            $table->bigInteger('category_id')->unsigned();
            $table->foreign('category_id')->references('category_id')->on('product_categories');
            $table->bigInteger('type_id')->unsigned();
            $table->foreign('type_id')->references('type_id')->on('product_types');
            $table->bigInteger('donation_id')->unsigned();
            $table->foreign('donation_id')->references('donation_id')->on('donations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
