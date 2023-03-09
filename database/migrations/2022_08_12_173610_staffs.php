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
        Schema::create('staffs', function (Blueprint $table) {
            $table->id();
            $table->string('Fullname',200);
            $table->string('Phone',55);
            $table->unsignedBigInteger('Branch_id')->nullable();
            $table->foreign('Branch_id')->references('id')->on('branchs');
            $table->string('Seniority',55);
            $table->string('Status')->comment('0:Nghỉ việc','1:Đang làm');
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
