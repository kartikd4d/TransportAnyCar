<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddInAppStatusByTranspotersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('quote_by_transpoters', function (Blueprint $table) {
            $table->enum('status', ['pending','accept','rejected'])->default('pending')->after('message');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('quote_by_transpoters', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}
