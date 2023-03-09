<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bills');
            $table->foreign('bills')->references('id')->on('bills');
            $table->unsignedBigInteger('MNV');
            $table->foreign('MNV')->references('id')->on('staffs');
            $table->unsignedBigInteger('branchs');
            $table->foreign('branchs')->references('id')->on('branchs');
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
        //
    }
};
