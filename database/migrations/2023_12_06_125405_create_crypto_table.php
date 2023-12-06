<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCryptoTable extends Migration
{
    
    public function up()
    {
        Schema::create('cryptos', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->boolean('edited')->default(false);
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('crypto');
    }

}
