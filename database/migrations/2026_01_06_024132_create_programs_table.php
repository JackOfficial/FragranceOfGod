<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->id();

            // Core content
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('excerpt', 255);
            $table->longText('description')->nullable();

            // UI support
            $table->string('icon')->default('fas fa-hands-helping');

            // Publishing & ordering
            $table->boolean('is_published')->default(true);

            // Laravel essentials
            $table->timestamps();
            $table->softDeletes();

            // Indexes for performance
            $table->index(['is_published']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('programs');
    }
};
