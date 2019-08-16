<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProductStore extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productStore', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedbigInteger('product_id');
            $table->foreign('product_id')
                  ->references('id')->on('products')->onDelete('cascade');
            $table->unsignedbigInteger('store_id');
            $table->foreign('store_id')
                  ->references('id')->on('stores')->onDelete('cascade');
            $table->integer('quantity')->nullable();
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
        Schema::dropIfExists('productStore');
    }
}
