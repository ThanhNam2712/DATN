<?php

use App\Models\User;
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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained();
            $table->string('Province');
            $table->string('district');
            $table->string('Neighborhood');
            $table->string('Apartment');
            $table->boolean('status');
            $table->string('province_name')->nullable(); // Tên tỉnh
            $table->string('district_name')->nullable(); // Tên quận/huyện
            $table->string('apartment_name')->nullable(); // Tên phường/xã
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
