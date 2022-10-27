<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemEgresoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_egreso', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('item_id')->nullable();
            $table->integer('egreso_id')->nullable();
            $table->integer('cantidad')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_egreso');
    }
}
