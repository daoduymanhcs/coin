<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuantstampsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quantstamps', function (Blueprint $table) {
            $table->increments('id');
            $table->double('usd');
            $table->double('btc');
            $table->double('eth');
            $table->double('volumnBtc');
            $table->double('volumnEth');
            $table->double('volumnUsd');
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
        Schema::dropIfExists('quantstamps');
    }
}
