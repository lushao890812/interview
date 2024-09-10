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
        Schema::create('booking', function (Blueprint $table) {
            $table->id(); // 主鍵 booking_id
            $table->foreignId('flight_id')->constrained('flights')->onDelete('cascade'); // 外鍵，參考 flights 表
            $table->foreignId('passenger_id')->constrained('passengers')->onDelete('cascade'); // 外鍵，參考 passengers 表
            $table->enum('passenger_type', ['成人', '兒童', '嬰兒']); // 乘客類別
            $table->string('seat_number', 10);
            $table->dateTime('booking_time');
            $table->decimal('price', 10, 2)->nullable(); // 添加票價字段
            $table->timestamps(); // created_at 和 updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking');
    }
};
