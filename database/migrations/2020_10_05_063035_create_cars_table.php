<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('cars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name') ;
            $table->unsignedBigInteger('carModel_id') ;;
            $table->foreign('carModel_id')->references('id')->on('cardmodels') ;
            $table->softDeletes() ;
            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
}
