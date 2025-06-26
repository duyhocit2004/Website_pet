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
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->String('SKU',200);
            $table->foreignId('category_id')->constrained('category')->onDelete('cascade');
            // $table->decimal('price', 10, 2);
            $table->string('title',300);
            $table->string('image', 255)->nullable();
            $table->string('description', 255)->nullable();
            $table->unsignedTinyInteger('rating');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
