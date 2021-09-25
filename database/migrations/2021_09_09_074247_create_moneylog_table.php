<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoneylogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moneylog', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('storage_id');
            $table->integer('years');
            $table->integer('month');
            $table->integer('money_before');
            $table->integer('earn');
            $table->integer('spend');
            $table->integer('total');
            $table->timestamps();
            $table->foreign('storage_id')->references('id')->on('storage');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('moneylog');
    }
}
