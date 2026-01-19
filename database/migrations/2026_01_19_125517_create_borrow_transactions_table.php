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
        Schema::create('borrow_transactions', function (Blueprint $table) {
            $table->id();

            // Link to borrow_requests table
            $table->foreignId('request_id')
                  ->constrained('borrow_requests')
                  ->cascadeOnDelete();

            // Dates are nullable, only set when borrowed/returned
            $table->date('date_borrowed')->nullable();

            // Status: pending / borrowed / returned / overdue / cancelled
            $table->enum('status', ['pending','borrowed','returned','overdue','cancelled'])
                  ->default('pending');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borrow_transactions');
    }
};
