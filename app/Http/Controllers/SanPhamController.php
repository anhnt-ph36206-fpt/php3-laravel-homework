<?php

namespace App\Http\Controllers;

use App\Models\SanPham;
use Illuminate\Http\Request;

class SanPhamController extends Controller
{
    public function index() {
        // dd('Đây là view danh sách sản phẩm');
        // $sanPham = SanPham::all();// Eloquent
        $sanPham = SanPham::paginate(10);// Pagination
        return view('ListSanPham', compact('sanPham'));
    }
}
