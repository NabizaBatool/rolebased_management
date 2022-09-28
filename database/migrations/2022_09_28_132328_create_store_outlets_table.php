<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoreOutletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_outlets', function (Blueprint $table) {
            $table->id();
            $table->string('branch');
            $table->boolean('status');
            $table->unsignedBigInteger('store_id');
            $table->foreign('store_id')->references('id')->on('stores') ;
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
        Schema::dropIfExists('store_outlets');
    }
}
