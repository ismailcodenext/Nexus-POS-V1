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
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->string('purchases_id')->nullable();
            $table->string('referance_no')->nullable();
            $table->date('date')->nullable();
            $table->string('status')->nullable();
            $table->string('subtotal')->nullable();
            $table->string('discount')->nullable();
            $table->string('grand_subtotal')->nullable();
            $table->string('paid')->nullable();
            $table->string('due')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('attach_document')->nullable();
            $table->unsignedBigInteger('supplier_id')->nullable();
            $table->unsignedBigInteger('wareshop_id')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('supplier_id')->references('id')->on('suprilers')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreign('wareshop_id')->references('id')->on('warehouses')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnUpdate()->restrictOnDelete();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchases');
    }
};
