<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropAdmissionChart extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('patients', function (Blueprint $table)
        {
        $table->dropColumn('admission_id');
        $table->dropColumn('chart_id');
        });
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('patients', function (Blueprint $table)
        {
        $table->bigInteger('chart_id')->unsigned();
        $table->bigInteger('admission_id')->unsigned();
        });      
        

    }
}
