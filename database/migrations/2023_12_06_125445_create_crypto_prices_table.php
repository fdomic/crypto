<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCryptoPricesTable extends Migration
{
        public function up()
    {
        Schema::create('crypto_prices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('crypto_id');
            $table->decimal('price', 10, 20);
            $table->decimal('percent_change_15m', 10, 20);
            $table->timestamps();

            $table->foreign('crypto_id')->references('id')->on('cryptos')->onDelete('cascade');
        });
    }
    
    public function down()
    {
        Schema::dropIfExistss('crypto_prices');
    }
}
