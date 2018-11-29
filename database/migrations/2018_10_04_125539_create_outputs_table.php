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
            $table->integer('saving_euro')->nullable();
            $table->integer('amount')->nullable();
            $table->integer('gas')->nullable();
            $table->integer('surface')->nullable();
            $table->integer('usage')->nullable();
            $table->integer('investment')->nullable();
            $table->integer('saving_meter')->nullable();
            $table->integer('saving_gas')->nullable();
            $table->string('payback')->nullable();
            $table->integer('suitability')->nullable();
            $table->integer('saving_kwh')->nullable();
            $table->uuid('report_uuid');
            $table->foreign('report_uuid')->references('uuid')->on('reports')->onDelete('CASCADE');
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
