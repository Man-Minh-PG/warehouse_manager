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
        Schema::create('unit_codes', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('product_type_id');
            
            $table->string('name', 200)->nullable()->default('text')->unique();
            $table->boolean('status')->nullable()->default(true);
            // $table->foreign('product_type_id')->references('id')->on('product_types')->onDelete('cascade');

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
        Schema::dropIfExists('unit_codes');
    }
};
