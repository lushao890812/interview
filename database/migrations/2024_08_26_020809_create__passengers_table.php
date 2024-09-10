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
        Schema::create('passengers', function (Blueprint $table) {
            $table->id(); // 主鍵 passenger_id
            $table->string('first_name', 50); // 乘客名字
            $table->string('last_name', 50);  // 乘客姓氏
            $table->string('gender', 10);      // 性別
            $table->date('date_of_birth');     // 出生日期
            $table->string('nationality', 50); // 國籍
            $table->string('email', 100);       // 電子郵件地址
            $table->string('phone_number', 20); // 聯絡電話
            $table->string('frequent_flyer', 50)->nullable(); // 常客會員編號（可選）
            $table->string('passport_number', 50)->nullable(); // 護照號碼（可選）
            $table->enum('passenger_type', ['成人', '兒童', '嬰兒']); // 乘客類別
            $table->timestamps(); // created_at 和 updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_passengers');
    }
};
