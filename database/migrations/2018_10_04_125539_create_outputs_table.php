<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOutputsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outputs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('saving_euro');
            $table->integer('amount');
            $table->integer('gas');
            $table->integer('surface');
            $table->integer('usage');
            $table->integer('investment');
            $table->integer('saving_meter');
            $table->integer('saving_gas');
            $table->integer('payback');
            $table->integer('suitability');
            $table->integer('saving_kwh');
            $table->unsignedInteger('report_id');
            $table->foreign('report_id')->references('id')->on('reports')->onDelete('CASCADE');
//            $table->integer('price');
//            $table->text('description');
//            $table->string('link');
//            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('outputs');
    }
}
