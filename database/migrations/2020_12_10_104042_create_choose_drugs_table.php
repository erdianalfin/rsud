<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChooseDrugsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('choose_drugs', function (Blueprint $table) {
            $table->id();
            $table->integer('health_checkup_id');
            $table->integer('drug_id');
            $table->integer('price');
            $table->integer('qty_drink_rules');
            $table->integer('qty_dosage_rules');
            $table->integer('amout_day');
            $table->integer('totals');
            $table->enum('status', ['waiting', 'success', 'recipe']);
            $table->enum('message', ['Sebelum makan', 'Sesudah makan']);
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
        Schema::dropIfExists('choose_drugs');
    }
}
