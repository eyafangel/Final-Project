<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('last_name');
            $table->string('first_name');
            $table->string('middle_name');
            $table->boolean('sex');
            $table->date('birthday');
            $table->integer('age');
            $table->string('contact_number')->nullable();
            $table->string('nationality');
            $table->bigInteger('residence_id')->unsigned();
            $table->bigInteger('guardian_id')->unsigned();
            $table->bigInteger('chart_id')->unsigned();
            $table->text('qr_code');
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
        Schema::dropIfExists('patients');
    }
}
