<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('stock_movements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->string('type'); // 'in', 'out', 'adjustment', 'sale', 'return'
            $table->integer('quantity');
            $table->text('reason')->nullable();
            $table->unsignedBigInteger('supplier_id')->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // who made this movement
            $table->timestamps();
            
            $table->foreign('supplier_id')
                  ->references('id')
                  ->on('suppliers')
                  ->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('stock_movements');
    }
};
