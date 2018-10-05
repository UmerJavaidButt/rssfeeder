<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForeignkeySavedProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('saved_products', function (Blueprint $table) {
            $table->integer('scrapped_id')->unsigned()->nullable();
            $table->foreign('scrapped_id')->references('id')->on('scrapped_data')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('saved_products', function (Blueprint $table) {
            $table->dropForeign('saved_products_scrapped_id_foreign');
        });
    }
}
