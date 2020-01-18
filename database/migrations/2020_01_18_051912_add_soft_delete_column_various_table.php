<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSoftDeleteColumnVariousTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $tables = [
            'branches',
            'users',
            'employees',
            'clients',
            'services',
            'appointments',
            'feedback'
        ];

        foreach ($tables as $table)
        {
            Schema::table($table, function ($table)
            {
                $table->softDeletes();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
