<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('to')->nullable();
            $table->string('from')->nullable();
            $table->string('receivers')->nullable();
            $table->string('mobile')->nullable();
            $table->mediumText('subject')->nullable();
            $table->mediumText('brief')->nullable();
            $table->mediumText('title')->nullable();
            $table->longText('content')->nullable();
            $table->integer('price')->nullable();
            $table->integer('total')->nullable();
            $table->integer('discount')->nullable();
            $table->integer('net_total')->nullable();
            $table->mediumText('hints')->nullable();
            $table->boolean('approved')->default(0);
            $table->boolean('sent')->default(0);
            $table->integer('user_id')->unsigned()->index()->nullable();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::drop('quotations');
    }
}
