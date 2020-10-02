<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_cars', function (Blueprint $table) {
            $table->id();
            $table->string('name') ;
            $table->unsignedBigInteger('maker_id');
            $table->unsignedBigInteger('carModel_id');
            $table->foreign('maker_id')->references('id')->on('makers') ;
            $table->foreign('carModel_id')->references('id')->on('cardmodels') ;
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
        Schema::dropIfExists('product_cars');
    }
}
