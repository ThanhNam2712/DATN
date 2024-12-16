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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained();
            $table->double('total_amount');
            $table->boolean('status');
            $table->boolean('payment_status');
            $table->string('Province')->nullable();;
            $table->string('district')->nullable();;
            $table->string('Neighborhood')->nullable();;
            $table->string('Apartment')->nullable();;
            $table->string('phone_number')->nullable();;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
