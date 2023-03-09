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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('Fullname',200);
            $table->string('Address');
            $table->string('Phonenumber');
            $table->string('Email');
            $table->string('Note');
            $table->string('Status')->comment('0:Liên hệ Notok - 1:KH Đang suy nghĩ - 2:KH đang thiếu tiền - 3:KH Đã chốt đơn ');
            $table->dateTime('date_todo')->nullable();
            $table->unsignedBigInteger('branch_id')->nullable();
            $table->foreign('branch_id')->references('id')->on('branchs');
            $table->unsignedBigInteger('staff_id')->nullable();
            $table->foreign('staff_id')->references('id')->on('staffs');
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
