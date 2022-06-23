<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipsToOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_details', function (Blueprint $table) {
            $table->foreign('cst_id')
                ->references('id')->on('customers')
                ->onDelete('cascade');
            $table->foreign('payment_id')
                ->references('id')->on('payments')
                ->onDelete('cascade');
            $table->foreign('address_id')
                ->references('id')->on('customer_addresses')
                ->onDelete('cascade');
            $table->foreign('courier_id')
                ->references('id')->on('couriers')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_details', function (Blueprint $table) {
            $table->dropForeign('order_details_cst_id_foreign');
            $table->dropForeign('order_details_payment_id_foreign');
            $table->dropForeign('order_details_address_id_foreign');
            $table->dropForeign('order_details_courier_id_foreign');
        });
    }
}
