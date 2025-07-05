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
        Schema::table('banner', function (Blueprint $table) {
            $table->string('title',50)->nullable();
            $table->string('descripton',100)->nullable();
            $table->string('Link_video',200);
            $table->string('Link_product',200);
            $table->string('status',30);
            $table->string('role',30);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('banner', function (Blueprint $table) {
            $table->dropColumn('title',50);
            $table->dropColumn('descripton',100);
            $table->dropColumn('Link_video',200);
            $table->dropColumn('Link_product',200);
            $table->dropColumn('status',30);
            $table->dropColumn('role',30);
        });
    }
};
