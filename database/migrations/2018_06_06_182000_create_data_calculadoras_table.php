<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataCalculadorasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_calculadoras', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tipo_id')->unsigned()->index();
            $table->foreign('tipo_id')->references('id')->on('tipo_variable');
            $table->integer('tipo_bono_id')->unsigned()->index();
            $table->foreign('tipo_bono_id')->references('id')->on('tipo_bono');
            $table->text('valor');
            $table->text('descripcion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('data_calculadoras');
    }
}
