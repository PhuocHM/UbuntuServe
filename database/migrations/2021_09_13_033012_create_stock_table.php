<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('supplier_id');
            $table->unsignedInteger('storage_id');
            $table->string('date_receive');
            $table->unsignedInteger('employee_id');
            $table->string('type_receive');
            $table->string('note');
            $table->integer('total_money');
            $table->integer('active');
            $table->timestamps();
            $table->foreign('supplier_id')->references('id')->on('supplier');
            $table->foreign('storage_id')->references('id')->on('storage');
            $table->foreign('employee_id')->references('id')->on('employee');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stock_product');
    }
}
