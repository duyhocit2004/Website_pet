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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string("code");
            $table->string('username');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('province_code')->nullable();   // Mã tỉnh
            $table->string('province_name')->nullable();   // Tên tỉnh
            $table->string('district_code')->nullable();   // Mã huyện
            $table->string('district_name')->nullable();   // Tên huyện
            $table->string('ward_code')->nullable();       // Mã xã
            $table->string('ward_name')->nullable();       // Tên xã
            $table->string('phone',10);
            $table->string('email');
            $table->string('note',200);
            $table->decimal('discount',12,0)->default(0);

            $table->foreignId('payment_method_id')->constrained('payment_method')->onDelete('cascade');
            $table->foreignId('payment_status_id')->constrained('payment_status')->onDelete('cascade');

            $table->string('status');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};
