<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_schedules', function (Blueprint $table) {
            $table->id();
            $table->string('no_reservation');
            $table->integer('schedule_id');
            $table->integer('patient_id');
            $table->string('booking_date');
            $table->string('booking_date_expires');
            $table->integer('user_id');
            $table->enum('status', ['success', 'process', 'waiting']);
            $table->integer('poliklinik_id');
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
        Schema::dropIfExists('booking_schedules');
    }
}
