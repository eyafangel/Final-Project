<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDatetimeToPatientUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('patient_user', function (Blueprint $table) {
            $table->date('date')->date_format('m/d/Y');
            $table->time('time')->format('h:i:s');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('patient_user', function (Blueprint $table) {
            $table->dropColumn(['date', 'time']);
        });
    }
}
