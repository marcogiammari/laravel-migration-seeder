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
        Schema::create('trains', function (Blueprint $table) {

            $table->id();
            $table->tinyInteger('azienda_id');
            $table->string('stazione_di_arrivo', 30);
            $table->Time('orario_di_partenza');
            $table->Time('orario_di_arrivo');
            $table->string('codice_treno', 5);
            $table->smallInteger('numero_carrozze');
            $table->string('ritardo', 3);
            $table->boolean('cancellato');
            $table->smallInteger('binario');
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
        Schema::dropIfExists('trains');
    }
};
