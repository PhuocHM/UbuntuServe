<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateSellingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('selling', function (Blueprint $table) {
            $table->foreign('employee_id')->references('id')->on('employee');
            $table->foreign('storage_id')->references('id')->on('storage');
            $table->foreign('room_id')->references('id')->on('room');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('selling', function (Blueprint $table) {
            //
        });
    }
}
