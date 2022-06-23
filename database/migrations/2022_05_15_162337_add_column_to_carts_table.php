<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('carts', function (Blueprint $table) {
            $table->double('order_total')->after('status');
            $table->double('order_totalDiscount')->nullable()->after('order_total');
            $table->tinyInteger('payment_method')->default(1)->after('order_totalDiscount');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('carts', function (Blueprint $table) {
            $table->dropColumn('order_total');
            $table->dropColumn('order_totalDiscount');
            $table->dropColumn('payment_method');
        });
    }
}
