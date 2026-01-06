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
        Schema::create('focused_areas', function (Blueprint $table) {
            $table->id();

            // Core content
            $table->string('title');                 // e.g. Community Outreach & Care
            $table->string('slug')->unique();        // community-outreach-care
            $table->string('excerpt', 255);          // short summary for cards
            $table->longText('description')->nullable(); // full page description

            // UI / presentation
            $table->string('icon')->default('fas fa-hands-helping');
            // FontAwesome class used in your blade

            // Publishing
            $table->boolean('is_published')->default(true);

            // Laravel essentials
            $table->timestamps();
            $table->softDeletes();

            // Performance
            $table->index(['is_published']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('focused_areas');
    }
};
