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
        // Adicionar soft deletes em products
        if (!Schema::hasColumn('products', 'deleted_at')) {
            Schema::table('products', function (Blueprint $table) {
                $table->softDeletes();
            });
        }

        // Adicionar soft deletes em services
        if (!Schema::hasColumn('services', 'deleted_at')) {
            Schema::table('services', function (Blueprint $table) {
                $table->softDeletes();
            });
        }

        // Adicionar soft deletes em categories
        if (!Schema::hasColumn('categories', 'deleted_at')) {
            Schema::table('categories', function (Blueprint $table) {
                $table->softDeletes();
            });
        }

        // Adicionar soft deletes em reviews
        if (!Schema::hasColumn('reviews', 'deleted_at')) {
            Schema::table('reviews', function (Blueprint $table) {
                $table->softDeletes();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

        Schema::table('services', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

        Schema::table('reviews', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};