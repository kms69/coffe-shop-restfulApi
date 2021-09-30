<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('price');
            $table->integer('quantity');
            $table->enum('order_status', ['waiting', 'preparation', 'ready','delivered']);
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
            $table->foreignId('order_id')->constrained()->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('product_id')->constrained()->onUpdate('cascade')
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_details');
    }
}
