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
       Schema::create('users', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->string('email')->unique();
    $table->timestamp('email_verified_at')->nullable();
    $table->string('password');
    $table->string('phone', 20)->nullable();
    $table->text('address')->nullable();
    $table->string('city', 100)->nullable();
    $table->string('state', 50)->nullable();
    $table->string('zip_code', 20)->nullable();
    $table->enum('role', ['customer', 'admin'])->default('customer');
    $table->rememberToken();
    $table->timestamps();
    $table->softDeletes();
});
    }
    
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

//Revisado - Lucas