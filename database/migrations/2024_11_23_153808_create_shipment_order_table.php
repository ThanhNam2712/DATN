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
        Schema::create('shipment_order', function (Blueprint $table) {
            $table->id();
            $table->string('shipments_1')->default('Chưa nhận đơn');
            $table->string('shipments_2')->default('Chưa xử lý');
            $table->string('shipments_3')->default('Chưa xử lý');
            $table->string('shipments_4')->default('Chưa xử lý');
            $table->string('shipments_5')->default('Chưa xử lý');
            $table->string('cancel')->default('Chưa xử lý');
            $table->bigIncrements('order_id');
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipment_order');
    }
};
