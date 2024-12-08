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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('discount_type');
            $table->double('discount_value');
            $table->date('expiration_date');
            $table->double('minimum_order_amount');
            $table->date('start_end')->nullable(); 
            $table->foreignIdFor(User::class)->onDelete('cascade')->after('id');
            $table->timestamps();
        });
        



    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
