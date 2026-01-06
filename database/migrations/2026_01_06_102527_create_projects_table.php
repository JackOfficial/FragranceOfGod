<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();

            // Core content
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('short_desc', 255);
            $table->longText('description')->nullable();

            // Publishing
            $table->boolean('is_published')->default(true);

            // Laravel essentials
            $table->timestamps();
            $table->softDeletes();

            // Performance
            $table->index(['is_published']);
            $table->index(['slug']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
