<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldImageToWwdHomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('wwd_homes', function (Blueprint $table) {
            $table->string('image1')->nullable()->after('desc2');
            $table->string('image2')->nullable()->after('image1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('wwd_homes', function (Blueprint $table) {
            $table->dropColumn('image1');
            $table->dropColumn('image2');
        });
    }
}
