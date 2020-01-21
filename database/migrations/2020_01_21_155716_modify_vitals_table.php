<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyVitalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vital_signs', function (Blueprint $table)
        {
        $table->dropColumn('datetime_taken');
        $table->bigInteger('patient_id')->unsigned();
        $table->string('pulse_rate');
        $table->string('remarks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vital_signs', function (Blueprint $table)
        {
        $table->date('datetime_taken');
        $table->dropColumn('patient_id');       
        $table->dropColumn('pulse_rate');
        $table->dropColumn('remarks');        
        });
    }
}
