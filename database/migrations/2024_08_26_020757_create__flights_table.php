<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->id(); // 主鍵 flight_id
            $table->string('flight_number', 10);
            $table->string('departure_airport', 100);
            $table->string('arrival_airport', 100);
            $table->dateTime('departure_time');
            $table->dateTime('arrival_time');
            $table->string('airline', 100);
            $table->integer('duration'); // 飛行時長（分鐘）
            $table->string('status', 20);
            $table->decimal('price', 10, 2); // 機票價格
            $table->timestamps(); // created_at 和 updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_flights');
    }
};
