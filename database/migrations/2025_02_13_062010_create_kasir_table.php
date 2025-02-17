<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('kasir', function (Blueprint $table) {
        $table->id();
        $table->foreignId('produk_id')->nullable()->constrained('produks')->onDelete('set null');
        $table->decimal('jumlah_terjual');
        $table->decimal('total_harga');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kasir');
    }
};
