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
        Schema::create('orders', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');
    $table->string('order_number', 50)->unique();
    $table->enum('status', ['pending', 'processing', 'completed', 'cancelled', 'refunded'])->default('pending');
    $table->decimal('subtotal', 10, 2);
    $table->decimal('tax', 10, 2)->default(0.00);
    $table->decimal('shipping', 10, 2)->default(0.00);
    $table->decimal('discount', 10, 2)->default(0.00);
    $table->decimal('total', 10, 2);
    $table->text('notes')->nullable();
    $table->string('billing_name');
    $table->string('billing_email');
    $table->string('billing_phone', 20);
    $table->text('billing_address');
    $table->string('billing_city', 100);
    $table->string('billing_state', 50);
    $table->string('billing_zip_code', 20);
    $table->string('shipping_name')->nullable();
    $table->string('shipping_email')->nullable();
    $table->string('shipping_phone', 20)->nullable();
    $table->text('shipping_address')->nullable();
    $table->string('shipping_city', 100)->nullable();
    $table->string('shipping_state', 50)->nullable();
    $table->string('shipping_zip_code', 20)->nullable();
    $table->string('payment_method', 50)->nullable();
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
