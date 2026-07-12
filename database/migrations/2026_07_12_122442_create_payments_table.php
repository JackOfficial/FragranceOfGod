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
        Schema::create('payments', function (Blueprint $table) {
               $table->id();
        $table->string('transaction_ref')->unique();
        $table->string('email')->nullable();
        $table->string('phone_number');
        $table->decimal('amount', 10, 2);
        $table->string('currency', 4)->default('RWF');
        $table->string('payment_method'); // e.g., mtn_rw, airtel_rw
        $table->string('status')->default('PENDING'); // PENDING, SUCCESS, FAILED
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
