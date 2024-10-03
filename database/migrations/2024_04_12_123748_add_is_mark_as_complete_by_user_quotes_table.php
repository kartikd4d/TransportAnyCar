<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsMarkAsCompleteByUserQuotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_quotes', function (Blueprint $table) {
            $table->enum('is_mark_as_complete', ['yes', 'no'])->default('no');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_quotes', function (Blueprint $table) {
            $table->dropColumn('is_mark_as_complete');
        });
    }
}
