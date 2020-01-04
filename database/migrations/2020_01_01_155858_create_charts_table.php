<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('charts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('chief_complaint');
            $table->bigInteger('vitals_id')->unsigned();
            $table->text('diagnosis');
            $table->string('ivf');
            $table->text('treatment');
            $table->string('prn');
            $table->bigInteger('medications_id')->unsigned();
            $table->double('height');
            $table->double('weight');
            $table->double('bmi');
            $table->string('blood_type');
            $table->text('diet');
            $table->text('doctors_notes');
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
        Schema::dropIfExists('charts');
    }
}
