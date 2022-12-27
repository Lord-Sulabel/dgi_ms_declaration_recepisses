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
        Schema::create('vehicules', function (Blueprint $table) {
            $table->id();
            $table->text('utilisation')->nullable();
            $table->text('genre')->nullable();
            $table->text('energie')->nullable();
            $table->text('puissance_fiscale')->nullable();
            $table->text('fk_proprietaire')->nullable();
            $table->text('type_proprietaire')->nullable();
            $table->text('marque')->nullable();
            $table->text('modele')->nullable();
            $table->integer('annee_fabrication')->nullable();
            $table->integer('nombre_chevaux')->nullable();
            $table->decimal('poid_vide')->nullable();
            $table->decimal('poid_charge')->nullable();
            $table->text('numero_chassis')->nullable();
            $table->text('numero_moteur')->nullable();
            $table->text('couleur')->nullable();
            $table->text('provenance')->nullable();
            $table->date('date_mec_initiale')->nullable();
            $table->text('status')->nullable();
            $table->text('create_date')->nullable();
            $table->text('create_agent')->nullable();
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
        Schema::dropIfExists('vehicules');
    }
};
