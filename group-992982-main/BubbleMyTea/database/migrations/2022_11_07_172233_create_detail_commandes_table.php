<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailCommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_commandes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('price');
            $table->DateTime('date');
            $table->integer('quantity');
            $table->integer('nb_ingredients');
            $table->string('base')->nullable();
            $table->string('toping1')->nullable();
            $table->string('toping2')->nullable();
            $table->string('toping3')->nullable();
            $table->string('toping4')->nullable();
            $table->string('perle')->nullable();
            $table->integer('sucre')->nullable();
            $table->unsignedBigInteger('num_history_commande_id');
            $table->foreign('num_history_commande_id')->references('id')->on('num_history_commandes');
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
        Schema::dropIfExists('detail_commandes');
    }
}
