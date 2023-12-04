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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('user_name')->nullable();
            $table->string('user_email')->nullable();
            $table->string('user_id')->nullable();
            $table->string('user_address')->nullable();
            $table->string('user_phone')->nullable();
           
            $table->string('item_name')->nullable();
            $table->string('item_id')->nullable();
            $table->string('item_quatity')->nullable();
            $table->string('price')->nullable();
            $table->string('payment_mode')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
