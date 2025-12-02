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
       Schema::create('products', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->string('slug')->unique();
    $table->text('description');
    $table->string('short_description')->nullable();
    $table->decimal('price', 10, 2);
    $table->decimal('sale_price', 10, 2)->nullable();
    $table->string('sku')->nullable()->unique();
    $table->unsignedInteger('quantity')->default(0);
    $table->boolean('is_featured')->default(false);
    $table->boolean('is_active')->default(true);
    $table->foreignId('category_id')->nullable()->constrained('categories')->onDelete('set null');
    $table->string('thumbnail')->nullable();
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
