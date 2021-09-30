<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('size', ['small', 'medium', 'large']);
            $table->enum('milk', ['skim', 'semi', 'whole']);
            $table->enum('shots', ['single', 'double', 'triple']);
            $table->enum('kind', ['chocolate chip', 'ginger']);
            $table->enum('location', ['take away', 'in shop']);

            $table->bigInteger('price');
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
        Schema::dropIfExists('products');
    }
}
