<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIntakeOutputsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {        
        
        Schema::create('intake_outputs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('patient_id')->unsigned();
            $table->text('ivf');
            $table->string('volume_infused');
            $table->text('oral');
            $table->text('urine');
            $table->text('drainage_volume');
            $table->text('stools_volume_description');
            $table->string('total_intake');
            $table->string('hour24_urine');
            $table->string('total_output');
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
        Schema::dropIfExists('intake_outputs');
    }
}
