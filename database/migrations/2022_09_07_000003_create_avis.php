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
        Schema::create('avis', function (Blueprint $table) {

            $table->id();

            $table->date('date_cloture')->nullable();
            
            $table->text('type')->nullable();
            $table->text('intitule')->nullable();
            $table->text('numero')->nullable();
            $table->text('status')->nullable();
            $table->text('doc_content')->nullable();
            $table->text('fk_agent_cloture')->nullable();
            $table->text('fk_agent_destinataire')->nullable();
                       
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
        Schema::dropIfExists('avis');
    }
};
