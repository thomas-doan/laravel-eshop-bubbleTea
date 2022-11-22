<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductIngredientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('product_ingredients', function (Blueprint $table) {
        $table->id();
        $table->timestamps();
        $table->unsignedBigInteger('product_id')->unsigned()->index();
        $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        
        $table->unsignedBigInteger('ingredient_id')->unsigned()->index();
        $table->foreign('ingredient_id')->references('id')->on('ingredients')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_ingredients');
    }
}
