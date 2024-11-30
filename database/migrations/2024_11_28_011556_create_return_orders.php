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
        Schema::create('return_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade');
            $table->string('status')->default('pending');
            $table->text('reason')->nullable();
            $table->decimal('refund_amount', 10, 2)->nullable();
            $table->string('refund_method')->nullable();
            $table->timestamp('request_date')->useCurrent();
            $table->timestamp('processed_date')->nullable();
            $table->foreignId('processed_by')->nullable()->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('return_order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('return_order_id')->constrained('return_orders')->onDelete('cascade'); // Liên kết với return_orders
            $table->foreignId('return_product_id')->constrained('products')->onDelete('cascade'); // Liên kết với return_orders
            $table->foreignId('product_variant_id')->constrained('product_variants')->onDelete('cascade'); // Liên kết sản phẩm hoàn trả
            $table->bigInteger('color');
            $table->bigInteger('size');
            $table->integer('quantity')->default(1); // Số lượng sản phẩm hoàn trả
            $table->decimal('price', 10, 2); // Giá của sản phẩm tại thời điểm mua
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('return_orders');
    }
};
