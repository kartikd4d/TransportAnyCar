<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDetailsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('first_name')->nullable()->after('username');
            $table->string('last_name')->nullable()->after('first_name');
            $table->string('address')->nullable()->after('email');
            $table->string('lat')->nullable()->after('address');
            $table->string('lng')->nullable()->after('lat');
            $table->string('address_line_1')->nullable()->after('lng');
            $table->string('address_line_2')->nullable()->after('address_line_1');
            $table->string('town')->nullable()->after('address_line_2');
            $table->string('county')->nullable()->after('town');
            $table->enum('outside_uk', ['yes','no'])->default('no')->after('county');
            $table->longText('driver_license')->nullable()->after('is_status');
            $table->longText('utility_bill')->nullable()->after('driver_license');
            $table->longText('public_liability')->nullable()->after('utility_bill');
            $table->longText('motor_trade_insurance')->nullable()->after('public_liability');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('first_name');
            $table->dropColumn('last_name');
            $table->dropColumn('address');
            $table->dropColumn('lat');
            $table->dropColumn('lng');
            $table->dropColumn('address_line_1');
            $table->dropColumn('address_line_2');
            $table->dropColumn('town');
            $table->dropColumn('county');
            $table->dropColumn('outside_uk');
            $table->dropColumn('driver_license');
            $table->dropColumn('utility_bill');
            $table->dropColumn('public_liability');
            $table->dropColumn('motor_trade_insurance');
        });
    }
}
