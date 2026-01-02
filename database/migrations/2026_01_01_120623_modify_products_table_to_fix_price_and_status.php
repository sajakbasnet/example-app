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
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('price');
            $table->dropColumn('status');
        });

        Schema::table('products', function (Blueprint $table) {
            $table->decimal('price', 10, 2)->nullable();
            $table->string('status')->default('active');
        });
    }

    /**
     * Reverse the migration.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('price');
            $table->dropColumn('status');
        });

        Schema::table('products', function (Blueprint $table) {
            $table->integer('price')->nullable();
            $table->boolean('status')->default(true);
        });
    }
};