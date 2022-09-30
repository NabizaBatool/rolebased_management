<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoreOutletCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_outlet_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('storeoutlet_id');
            $table->foreign('storeoutlet_id')->references('id')->on('store_outlets');
            $table->unsignedBigInteger('storecategory_id');
            $table->foreign('storecategory_id')->references('id')->on('store_categories');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('store_outlet_categories');
    }
}
