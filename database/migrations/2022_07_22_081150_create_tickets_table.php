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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('entry_gate_id');
            $table->foreignId('exit_gate_id')->nullable();
            $table->foreignId('slot_id');
            $table->foreignId('vehicle_id');
            $table->foreignId('ticket_number')->unique();
            $table->timestamp('entered_at');
            $table->timestamp('left_at')->nullable();
            $table->integer('duration')->nullable();
            $table->double('amount', 8, 2)->nullable();
            $table->tinyInteger('status')->default(0)->index();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('entry_gate_id')
                ->references('id')
                ->on('gates')
                ->cascadeOnDelete();
            $table->foreign('exit_gate_id')
                ->references('id')
                ->on('gates')
                ->cascadeOnDelete();
            $table->foreign('slot_id')
                ->references('id')
                ->on('slots')
                ->cascadeOnDelete();
            $table->foreign('vehicle_id')
                ->references('id')
                ->on('vehicles')
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
        Schema::dropIfExists('tickets');
    }
};
