<?php

namespace App\Http\Controllers;

use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SanPhamController extends Controller
{
    public function index() {
        // dd('Đây là view danh sách sản phẩm');
        // $sanPham = SanPham::all();// Eloquent

        $titlePage = 'Quản lý sản phẩm';
        $title = 'Danh sách sản phẩm';

        //  Dùng Query Builder
        $sanPhams = DB::table('san_phams')
                    ->join('danh_mucs', 'san_phams.category_id', '=', 'danh_mucs.id')
                    ->select('san_phams.*', 'danh_mucs.name as category_name')
                    ->orderBy('san_phams.id', 'desc')
                    ->paginate(10);
        
        // $sanPham = SanPham::paginate(10);// Pagination
        return view('admin.sanpham.ListSanPham', compact('sanPhams', 'titlePage', 'title'));
    }
        /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // dd('Đã vào được controller thêm sản phẩm');
        $titlePage = 'Quản lý sản phẩm';
        $title = 'Thêm sản phẩm';

        //  Dùng Query Builder
        $danhMucs = DB::table('danh_mucs')
                        ->get();

        return view('admin.sanpham.CreateSanPham', compact('danhMucs','titlePage', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Cần có token csrf để chống tấn công csrf, nếu không sẽ lỗi
        // dd($request);

        // Validate dữ liệu
        // Có thể validate ở model hoặc controller
        // Ngoài validate ở view client thì nên validate thêm ở model hoặc controller
        // Tránh trường hợp bị tác động vào csdl

        //  Keywork: Validation Laravel Docs
        //  Available Validation Rules: https://laravel.com/docs/10.x/validation#available-validation-rules
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|integer|min:0', // step 100
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|integer|exists:danh_mucs,id', // Phải có id trong bảng danh_mucs thì mưới được thêm
            'active' => 'nullable|boolean', // nullable: có thể không có giá trị
        ]);

        //  Dùng Query Builder
        DB::table('san_phams')
            ->insert([
                'name' => $request->input('name'),
                'price' => $request->input('price'),
                'stock' => $request->input('stock'),
                'category_id' => $request->input('category_id'),
                'active' => $request->input('active'), 
                'created_at' => now(),
                'updated_at' => now(),
            ]);

        //  Redirect về trang danh sách sản phẩm
        return redirect()->route('danh-sach-san-pham.index')
                         ->with('success', 'Thêm sản phẩm thành công');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        // dd('Đây là Trang Chi Tiết Sản Phẩm');
        $titlePage = 'Quản lý sản phẩm';
        $title = 'Thông tin chi tiết sản phẩm';
        
        //  Dùng Query Builder
        $sanPhams = DB::table('san_phams')
                    ->join('danh_mucs', 'san_phams.category_id', '=', 'danh_mucs.id')
                    ->select('san_phams.*', 'danh_mucs.name as category_name')
                    ->where('san_phams.id', $id)
                    ->first();
        
        return view('admin.sanpham.ShowSanPham', compact('sanPhams', 'titlePage', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $titlePage = 'Quản lý sản phẩm';
        $title = 'Sửa thông tin sản phẩm';
        // dd($titlePage . ' ' . $title);

        //  Dùng Query Builder
        $sanPhams = DB::table('san_phams')
                    ->where('id', $id)
                    ->first();
        $danhMucs = DB::table('danh_mucs')
                    ->get();
        // dd($sanPhams);
        // dd($danhMucs);

        return view('admin.sanpham.EditSanPham', compact('sanPhams', 'danhMucs', 'titlePage', 'title'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($id);
        // Dùng Query Builder
        $sanPhams = DB::table('san_phams')
                    ->where('id', $id)
                    ->first();
            
        if (!$sanPhams) {
            return redirect()->route('danh-sach-san-pham.index')
                ->with('error', 'Sản phẩm không tồn tại');
        } else {
            $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|integer|min:0', // step 100
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|integer|exists:danh_mucs,id', // Phải có id trong bảng danh_mucs thì mưới được thêm
            'active' => 'nullable|boolean', // nullable: có thể không có giá trị
        ]);


        //  Dùng Query Builder
        DB::table('san_phams')->where('id', $id)->update([
                'name' => $request->input('name'),
                'price' => $request->input('price'),
                'stock' => $request->input('stock'),
                'category_id' => $request->input('category_id'),
                'active' => $request->input('active'), 
                'updated_at' => now(),
            ]);

            return redirect()->route('danh-sach-san-pham.index')->with('success', 'Sửa sản phẩm thành công');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // dd('Đây là route xoá sản phẩm');
        $sanPhams =  DB::table('san_phams')
            ->where('id', $id)
            ->first();

        if (!$sanPhams) {
            return redirect()->route('danh-sach-san-pham.index')->with('error', 'Sản phẩm không tồn tại');
        } else {
            DB::table('san_phams')
                ->where('id', $id)
                ->delete();
            return redirect()->route('danh-sach-san-pham.index')->with('delete', 'Xoá sản phẩm <strong>' . "$sanPhams->name" . '</strong> thành công');         
        }
        
    }
}
