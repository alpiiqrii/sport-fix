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
        Schema::table('kasir', function (Blueprint $table) {
            // Hapus foreign key lama
            $table->dropForeign(['produk_id']);
    
            // Tambahkan foreign key baru dengan ON DELETE SET NULL
            $table->foreign('produk_id')
                  ->references('id')
                  ->on('produks')
                  ->onDelete('set null');
        });
    }
    
    public function down()
    {
        Schema::table('kasir', function (Blueprint $table) {
            // Hapus foreign key baru
            $table->dropForeign(['produk_id']);
    
            // Tambahkan foreign key lama tanpa ON DELETE SET NULL
            $table->foreign('produk_id')
                  ->references('id')
                  ->on('produks');
        });
    }
};
