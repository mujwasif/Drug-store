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
        Schema::create('wishlists', function (Blueprint $table) {
            $table->id();
            $table->string('user_name')->nullable();
            $table->string('user_id')->nullable();
            $table->string('user_mail')->nullable();
            $table->string('item_name')->nullable();
            $table->string('item_id')->nullable();
            $table->string('item_price')->nullable();
            $table->string('item_quantity')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wishlists');
    }
};
