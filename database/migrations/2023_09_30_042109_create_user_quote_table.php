<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserQuoteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_quotes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('pickup_postcode')->nullable();
            $table->string('drop_postcode')->nullable();
            $table->string('vehicle_details')->nullable();
            $table->enum('starts_drives', ['0', '1'])->default('0');
            $table->string('image')->nullable();
            $table->enum('operable', ['0', '1'])->default('0')->comment('run_drives');
            $table->string('how_moved')->nullable();
            $table->date('delivery_timeframe_from')->nullable();
            $table->date('delivery_timeframe_to')->nullable();
            $table->string('delivery_timeframe')->nullable();
            $table->string('email')->nullable();
            $table->enum('status', ['pending', 'approved','ongoing','completed','cancelled'])->default('pending');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_quote');
    }
}
