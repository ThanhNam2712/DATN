<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('addresses', function (Blueprint $table) {
            $table->string('province_name')->nullable(); // Tên tỉnh
            $table->string('district_name')->nullable(); // Tên quận/huyện
            $table->string('apartment_name')->nullable(); // Tên phường/xã
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('addresses', function (Blueprint $table) {
            $table->dropColumn(['province_name', 'district_name', 'ward_name']);
        });
    }
};
