<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVehicleMakeByUserQuotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_quotes', function (Blueprint $table) {
            $table->string('vehicle_make')->nullable()->after('vehicle_details');
            $table->string('vehicle_model')->nullable()->after('vehicle_make');
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
            $table->dropColumn('vehicle_make');
            $table->dropColumn('vehicle_model');
        });
    }
}
