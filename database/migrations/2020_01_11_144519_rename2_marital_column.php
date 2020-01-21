<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Rename2MaritalColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('patients', function(Blueprint $table)
        {
            
            $table->renameColumn('marital_status_id', 'marital_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('patients', function(Blueprint $table)
        {
            $table->renameColumn('marital_status', 'marital_status_id');
        });
    }
}
