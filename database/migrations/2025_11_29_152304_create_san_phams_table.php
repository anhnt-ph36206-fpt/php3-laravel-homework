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
        Schema::create('san_phams', function (Blueprint $table) {
            $table->id();   // Trường id tự động tăng
            $table->string('name'); // Trường tên sản phẩm
            $table->decimal('price', 10, 2); // Trường giá sản phẩm, tối đa 10 chữ số, 2 chữ số thập phân
            $table->integer('stock')->unsigned(); // Trường số lượng tồn kho, dùng unsigned để không cho phép giá trị âm
            $table->boolean('active')->default(true); // Trường trạng thái hoạt động, mặc định là true
            $table->timestamps(); //    Created at và updated at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('san_phams');
    }
};
