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
        Schema::create('DangKyLopHoc', function (Blueprint $table) {
            $table->id('MaDangKy');
            $table->bigInteger('MaLopHoc');
            $table->bigInteger('MaHocVien');  
            $table->integer('HocPhi');          
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('DangKyLopHoc');
    }
};
