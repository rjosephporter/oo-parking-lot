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
        Schema::create('entrance_slot', function (Blueprint $table) {
            $table->foreignId('gate_id');
            $table->foreignId('slot_id');
            $table->integer('distance');
            $table->timestamps();

            $table->foreign('gate_id')
                ->references('id')
                ->on('gates')
                ->cascadeOnDelete();
            $table->foreign('slot_id')
                ->references('id')
                ->on('slots')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entrance_slot');
    }
};
