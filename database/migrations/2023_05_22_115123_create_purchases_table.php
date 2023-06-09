<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            //符号なしの自動増分id(主キー)
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->integer('product_id');
            $table->tinyInteger('purchase_flg')->default(0);
            $table->timestamp('purchase_time')->nullable();//nullを許可してる
            $table->string('money','100');
            $table->tinyInteger('quantity')->default(0);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchases');
    }
}
