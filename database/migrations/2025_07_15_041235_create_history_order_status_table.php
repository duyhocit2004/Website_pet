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
        Schema::create('history_order_status', function (Blueprint $table) {
            $table->id();
            $table->foreignId('Order_id')->constrained('orders')->onDelete('cascade');
            $table->string('order_status_old',50);
            $table->string('order_status_new',50);
            $table->string('User_edit_method',50);
            $table->String('note',200);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('history_payment_method');
    }
};
