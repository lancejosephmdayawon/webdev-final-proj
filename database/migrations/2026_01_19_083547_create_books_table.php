<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id(); // BIGINT UNSIGNED
            $table->string('isbn', 20)->unique();
            $table->string('title');
            $table->string('author');
            $table->unsignedInteger('category_id'); // matches categories.id INT UNSIGNED
            $table->unsignedInteger('stock_qty')->default(0);
            $table->text('description')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
