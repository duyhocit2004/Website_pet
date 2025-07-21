<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orderdetail', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade');
            $table->foreignId('product_id')->nullable(); // có thể null nếu sản phẩm bị xóa
            $table->string('product_name');              // lưu tên tại thời điểm đặt
            $table->integer('quantity');
            $table->decimal('price', 12, 2);             // đơn giá lúc đặt
            $table->decimal('total_price', 12, 2);       // = price * quantity

            $table->string('color')->nullable();         // nếu có biến thể
            $table->string('size')->nullable();          // nếu có biến thể
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orderdetail');
    }
};
