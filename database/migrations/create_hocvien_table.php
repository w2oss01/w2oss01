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
        Schema::create('HocVien', function (Blueprint $table) {
            $table->id('MaHocVien');
            $table->string('HoTen');
            $table->string('SoDT');
            $table->string('NgaySinh');
            $table->boolean('GioiTinh'); #0=Nữ, 1=Nam
            $table->string('DiaChi');
            $table->string('Email');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('HocVien');
    }
};
