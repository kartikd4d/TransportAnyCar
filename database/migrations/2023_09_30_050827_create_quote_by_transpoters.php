<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuoteByTranspoters extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quote_by_transpoters', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->comment('car_transporter');
            $table->unsignedBigInteger('user_quote_id')->comment('user_quote');
            $table->string('price')->nullable();
            $table->longText('message')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('user_quote_id')->references('id')->on('user_quotes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quote_by_transpoters');
    }
}
