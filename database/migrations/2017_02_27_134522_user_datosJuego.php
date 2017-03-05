<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserDatosJuego extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function($table){
            $table->boolean('isAdmin')->default(false);
            $table->integer('partidasTotales')->default(0);
            $table->integer('partidasGanadas')->default(0);
            $table->integer('partidasEmpatadas')->default(0);
            $table->integer('partidasPerdidas')->default(0);
            $table->integer('puntuacion')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function ($table) {
            $table->dropColumn('isAdmin');
            $table->dropColumn('partidasTotales');
            $table->dropColumn('partidasGanadas');
            $table->dropColumn('partidasEmpatadas');
            $table->dropColumn('partidasPerdidas');
            $table->dropColumn('puntuacion');
        });
    }
}
