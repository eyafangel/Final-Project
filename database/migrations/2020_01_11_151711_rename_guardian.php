<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameGuardian extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('guardians', function (Blueprint $table) 
        {
            $table->renameColumn('last_name', 'guardian_last_name');
            $table->renameColumn('first_name', 'guardian_first_name');
            $table->renameColumn('middle_name', 'guardian_middle_name');
            $table->renameColumn('contact_number', 'guardian_contact_number');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('guardians', function (Blueprint $table) 
        {
            $table->renameColumn('guardian_last_name', 'last_name');
            $table->renameColumn('guardian_first_name', 'first_name');
            $table->renameColumn('guardian_middle_name', 'middle_name');
            $table->renameColumn('guardian_contact_number', 'contact_number');
        });
        
    }
}
