<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhMuc extends Model
{
    /** @use HasFactory<\Database\Factories\DanhMucFactory> */
    use HasFactory;

    //  Bắt đầu sử dụng Eloquent
    public function sanPham() {
        return $this->hasMany(SanPham::class, 'category_id', 'id');
    }
}
