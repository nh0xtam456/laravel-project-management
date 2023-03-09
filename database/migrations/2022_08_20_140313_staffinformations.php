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
        Schema::create('staffinformations', function (Blueprint $table) {
            $table->id();
            $table->string('CV');
            $table->unsignedBigInteger('MNV');
            $table->foreign('MNV')->references('id')->on('staffs');
            $table->string('Salary');
            $table->string('Level');
            $table->string('Note');
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
