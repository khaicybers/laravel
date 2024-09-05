<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',200);
            $table->float('price',10,3);
            $table->float('sale_price',10,3)->default(0);
            $table->string('image')->nullable();
            $table->text('content')->nullable();
            $table->integer('category_id')->nullable();
            $table->tinyInteger('status')->default(0);
            // $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // Schema::dropIfExists('products');
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign('products_category_id_foreign');
        });
        Schema::dropIfExists('products');
    }
};
