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
        Schema::create('voucher', function (Blueprint $table) {
            $table->id();
            $table->string("code",100);
            $table->string('description',100);
            $table->enum('discount_type',['precent','amount']);
            $table->decimal("discount_value",8,3);
            $table->decimal("max_discount",8,3);
            $table->decimal("min_order_amount",8,3);
            $table->integer('usage_limit');
            $table->integer('used_count');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->string("is_active");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voucher');
    }
};
