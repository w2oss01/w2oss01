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
        Schema::create('LopHoc', function (Blueprint $table) {
            $table->id('MaLopHoc');
            $table->bigInteger('MaMonHoc');
            $table->integer('HocKy');
            $table->integer('NamHoc');
            $table->boolean('MoDangKy');
            $table->integer('HocPhi');
            $table->string('HinhAnh');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('LopHoc');
    }
};
