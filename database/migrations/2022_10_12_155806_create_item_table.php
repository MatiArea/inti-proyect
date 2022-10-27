<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item', function (Blueprint $table) {
            $table->integer('item_id')->primary()->unique();
            $table->string('codigo')->nullable();
            $table->string('descripcion')->nullable();
            $table->integer('stock')->nullable();
            $table->integer('ubicacion_id')->nullable();
            $table->integer('tipo_producto_id')->nullable();
            $table->integer('responsable_id')->nullable();
            $table->integer('stock_minimo')->nullable();
            $table->integer('inventariable')->nullable();
            $table->integer('baja')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item');
    }
}
