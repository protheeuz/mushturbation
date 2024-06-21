<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('transaction_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('transaction_id')->constrained('transactions')->onDelete('cascade'); // Menggunakan foreignId
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade'); // Menggunakan foreignId
            $table->integer('quantity');
            $table->string('product_name'); // Tambahkan product_name
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transaction_details');
    }
};