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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('item_name', 100);
            $table->string('item_details', 100);
            $table->string('item_type', 100);
            $table->integer('item_sell_price');
            $table->integer('item_real_price');
            $table->string('item_generic_name', 100);
            $table->string('item_dealer_name', 100);
            $table->string('item_company_name', 100);
            $table->integer('item_quantity');
            $table->integer('item_strength');
            $table->integer('item_stock');
            $table->integer('item_added_by');
            $table->timestamps();
            $table-> unique(['item_name','item_strength']);
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
