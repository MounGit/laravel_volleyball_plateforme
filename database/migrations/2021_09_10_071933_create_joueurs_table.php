<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJoueursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('joueurs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('firstname');
            $table->integer('age');
            $table->string('phone');
            $table->string('email');
            $table->string('gender');
            $table->string('country');
            $table->foreignId('role_id')->constrained('roles', 'id')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('equipe_id')->nullable()->constrained('equipes', 'id')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('joueurs');
    }
}
