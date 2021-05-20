<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partidas', function (Blueprint $table) {
            $table->id();
            $table->string('time_casa', 64);
            $table->string('time_fora', 64);
            $table->string('estadio', 64);
            $table->date('data');
            $table->time('horario');
            $table->string('competicao', 64);
            $table->string('emissoras', 64);
            $table->integer('confirmados');
            $table->text('descricao');
            $table->string('image');
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
        Schema::dropIfExists('partidas');
    }
}
