<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('focusables', function (Blueprint $table) {
            $table->id();

            $table->foreignId('focused_area_id')
                  ->constrained()
                  ->cascadeOnDelete();

            $table->morphs('focusable'); 
            // focusable_id + focusable_type

            $table->timestamps();

            $table->unique(
                ['focused_area_id', 'focusable_id', 'focusable_type'],
                'focusables_unique'
            );
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('focusables');
    }
};
