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
        Schema::table('books', function (Blueprint $table) {
            $table->decimal('rating', 2, 1)->default(0);  // Overall rating out of 5 (e.g., 4.5)
            $table->unsignedBigInteger('rating_count')->default(0);  // How many users have rated the book
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('books', function (Blueprint $table) {
            $table->dropColumn('rating');
            $table->dropColumn('rating_count');
        });
    }
};
