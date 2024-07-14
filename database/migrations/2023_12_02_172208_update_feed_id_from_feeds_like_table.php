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
        Schema::table('feeds_id', function (Blueprint $table) {
            $table->rename('feeds_like');
            $table->dropConstrainedForeignId('feed_id');
            $table->foreignId('feeds_id')->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('feeds_like', function (Blueprint $table) {
            //
        });
    }
};
