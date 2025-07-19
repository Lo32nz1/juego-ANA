<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamePlayersTable extends Migration
{
    public function up()
    {
        Schema::create('game_players', function (Blueprint $table) {
            $table->id();
            $table->foreignId('game_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->integer('score')->default(0); // Puntaje (número de veces que formó "ANA")
            $table->boolean('is_active')->default(true); // Indica si el jugador sigue en la partida
            $table->integer('turn_order')->nullable(); // Orden del turno (1, 2, 3 o 4)
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('game_players');
    }
}
