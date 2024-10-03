<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPickupLatToUserQuotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_quotes', function (Blueprint $table) {
            $table->string('pickup_lat')->nullable()->after('pickup_postcode');
            $table->string('pickup_lng')->nullable()->after('pickup_lat');
            $table->string('drop_lat')->nullable()->after('drop_postcode');
            $table->string('drop_lng')->nullable()->after('drop_lat');
            $table->string('map_image')->nullable()->after('image');
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
            $table->dropColumn('pickup_lat');
            $table->dropColumn('pickup_lng');
            $table->dropColumn('drop_lat');
            $table->dropColumn('drop_lng');
            $table->dropColumn('map_image');
        });
    }
}
