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
        Schema::create('slot_type_vehicle_type', function (Blueprint $table) {
            $table->foreignId('slot_type_id');
            $table->foreignId('vehicle_type_id');

            $table->foreign('slot_type_id')
                ->references('id')
                ->on('slot_types')
                ->cascadeOnDelete();
            $table->foreign('vehicle_type_id')
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
        Schema::dropIfExists('slot_type_vehicle_types');
    }
};
