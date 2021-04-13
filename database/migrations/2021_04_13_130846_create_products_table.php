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
            $table->string('resume');
            $table->string('provider');
            $table->string('provphone');
            $table->string('provname');
            $table->string('buyprice');
            $table->string('sellprice');
            $table->string('bitterness');
            $table->string('temperature');
            $table->string('ibv');
            $table->string('type');
            $table->string('image');
            $table->text('description');
            $table->integer('spotlight');
            $table->integer('status');
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
