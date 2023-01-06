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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('unit_id');
            $table->unsignedBigInteger('product_type_id');

            $table->string('name', 200)->nullable()->default('text');
            $table->double('price')->nullable()->default(000.000);
            $table->smallInteger('amount')->nullable()->default(1);
            $table->boolean('status')->nullable()->default(true);

            $table->foreign('unit_id')->references('id')->on('unit_codes')->onDelete('cascade');
            $table->foreign('product_type_id')->references('id')->on('product_types')->onDelete('cascade');
            
            $table->timestamps();
            $table->softDeletes();
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
};
