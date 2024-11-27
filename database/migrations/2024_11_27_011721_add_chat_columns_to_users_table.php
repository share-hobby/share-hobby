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
        Schema::table('users', function (Blueprint $table) {
            $table->text('bio')->nullable(); // プロフィール
            $table->string('picture')->nullable(); // プロフィール画像
            $table->string('phone_number')->nullable(); // 電話番号
            $table->string('username')->unique(); // ユーザー名
            $table->boolean('status')->default(true); // アクティブ状態
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['bio', 'picture', 'phone_number', 'username', 'status']);
        });
    }
};
