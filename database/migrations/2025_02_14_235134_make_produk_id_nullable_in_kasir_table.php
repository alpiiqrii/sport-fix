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
            // Ubah kolom produk_id menjadi nullable
            $table->unsignedBigInteger('produk_id')->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('kasir', function (Blueprint $table) {
            // Kembalikan kolom produk_id menjadi tidak nullable
            $table->unsignedBigInteger('produk_id')->nullable(false)->change();
        });
    }
};
