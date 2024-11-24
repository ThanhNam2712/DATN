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
        Schema::create('refund_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('refund_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedInteger('quantity');
            $table->decimal('price', 10, 2);
            $table->timestamps();
            $table->foreign('refund_id')->references('id')->on('refunds')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('refund_items');
    }
};
