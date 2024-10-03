<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDistanceByUserQuotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_quotes', function (Blueprint $table) {
            $table->string('distance')->nullable()->after('drop_lng');
            $table->string('duration')->nullable()->after('distance');
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
            $table->dropColumn('distance');
            $table->dropColumn('duration');
        });
    }
}
