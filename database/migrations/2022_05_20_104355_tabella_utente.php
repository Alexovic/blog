<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            # Con questa istruzione viene generata la colonna
            # ID, ovvero l'identificativo di ogni riga evento
            # nonchè chiave primaria della tabella.
            # La chiave primaria è unica, autoincrementante e minimale.
            $table->id();

            $table->string('email'); 
            $table->string('password');
            $table->string('firstName');
            $table->string('lastName');
            $table->date('birthDate');
            $table->string('city');
            
            # la data di creazione di un evento e la data dell'ultimo
            # aggiornamento.
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
        Schema::dropIfExists('users');
    }
};

//creare file rotte - creare controller user - modello - registrazione utente 