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
            $table->id();
            $table->string('name') ;
            $table->integer('price') ;
            $table->string('description') ;
            $table->unsignedBigInteger('carModel_id')->nullable();
            $table->unsignedBigInteger('brand_id');
            $table->foreign('carModel_id')->references('id')->on('cardmodels') ;
            $table->foreign('brand_id')->references('id')->on('brands') ;
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
        Schema::dropIfExists('products');
    }
}
