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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            
            // Optional: link authenticated users/donors
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
            
            // Financial details
            $table->decimal('amount', 12, 2);
            $table->string('currency', 3)->default('RWF'); // RWF or USD
            
            // Status tracking lifecycle
            $table->string('status')->default('pending'); // pending, completed, failed
            
            // AfriPay callback audit fields
            $table->string('transaction_ref')->nullable()->unique();
            $table->string('payment_method')->nullable(); // e.g., mtn_rw, card
            
            $table->text('message')->nullable(); // Optional donor message
            $table->timestamps();
            
            // Indexing for high-performance record locking via lockForUpdate()
            $table->index(['id', 'status']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
