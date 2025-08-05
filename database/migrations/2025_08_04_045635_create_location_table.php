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
        Schema::create('location', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('province_code', 100);  
            $table->string('province_name', 100);
            $table->string('district_code', 100);
            $table->string('district_name', 100);
            $table->string('ward_code',100);
            $table->string('ward_name',100);
            $table->string('phone',10);
            $table->string('location_detail',200);
            $table->integer('is_default')->default(0);
            $table->string('name',50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('location');
    }
};
