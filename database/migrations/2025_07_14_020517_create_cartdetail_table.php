<?php

use App\Models\Product;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cartdetail', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cart_id')->constrained('cart')->onDelete('cascade');
            $table->foreignIdFor(Product::class);
            $table->foreignId('product_vartiant_id')->constrained('product_vartiant')->onDelete('cascade');
            $table->string('quantity');
            $table->decimal(10,2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cartdetail');
    }
};
