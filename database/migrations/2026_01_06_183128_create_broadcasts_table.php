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
        Schema::create('broadcasts', function (Blueprint $table) {
            $table->id();

            $table->string('subject');           // Subject of the message
            $table->text('message');             // Message content
            $table->enum('status', ['draft', 'sent'])
                  ->default('draft');           // Status: draft or sent
            $table->timestamp('sent_at')->nullable(); // When it was sent (null if not yet sent)

            $table->timestamps();               // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('broadcasts');
    }
};
