<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('return_logs', function (Blueprint $table) {
            $table->id();

            // Link to borrow_transactions
            $table->foreignId('transaction_id')
                  ->constrained('borrow_transactions')
                  ->cascadeOnDelete();

            $table->date('date_returned'); // renamed column
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('return_logs');
    }
};


