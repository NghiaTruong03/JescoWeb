<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOrderInfoToCarts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('carts', function (Blueprint $table) {
            $table->string('order_name');
            $table->string('order_email');
            $table->string('order_phone');
            $table->string('order_address');
            $table->string('order_note')->nullable();
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
            $table->dropColumn('order_name');
            $table->dropColumn('order_email');
            $table->dropColumn('order_phone');
            $table->dropColumn('order_address');
            $table->dropColumn('order_note');


        });
    }
}
