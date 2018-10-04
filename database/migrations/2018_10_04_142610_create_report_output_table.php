<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportOutputTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_output', function (Blueprint $table) {
            $table->unsignedInteger('report_id');
            $table->foreign('report_id')->references('id')->on('reports')->onDelete('CASCADE');

            $table->unsignedInteger('output_id');
            $table->foreign('output_id')->references('id')->on('outputs')->onDelete('CASCADE');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('report_output');
    }
}
