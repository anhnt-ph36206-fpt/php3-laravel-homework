<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    /** @use HasFactory<\Database\Factories\SanPhamFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'category_id',
        'price',
        'stock',
        'active',
        'created_at',
        'updated_at'
    ];

    public $timestamps = true;

    public function danhMuc() {
        return $this->belongsTo(DanhMuc::class, 'category_id','id');
    }
}
