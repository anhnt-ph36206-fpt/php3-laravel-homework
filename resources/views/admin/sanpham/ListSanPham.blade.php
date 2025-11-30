@extends('layouts.AdminLayout')
@section('title-page')
    {{ $titlePage }}
@endsection
@section('card-header')
    <h3 class="card-title">{{ $title }}</h3>    
    <div class="card-tools">
        <a href="{{ route('danh-sach-san-pham.create') }}" class="btn btn-success">Thêm Sản Phẩm</a>
    </div>
@endsection
@section('card-body')
    {{-- <h1>Danh sách sản phẩm</h1> --}}
    {{-- with lưu dữ liệu vào session --}}
    @if (session('success'))
        <div class="alert alert-success" id="success-alert">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger" id="error-alert">{{ session('error') }}</div>
    @endif
    <table class="table table-striped table-hover align-middle">
        <thead class="table-dark">
            <tr class="text-center">
                <th scope="col">STT</th>
                <th scope="col">Tên Sản Phẩm</th>
                <th scope="col">Tên Danh Mục</th>
                <th scope="col">Giá Sản Phẩm</th>
                <th scope="col">Sản Phẩm Tồn Kho</th>
                <th scope="col">Trạng Thái Sản Phẩm</th>
                <th scope="col">Hành Động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sanPhams as $key => $sp)
                <tr>
                    <td class="text-center">{{ $key + 1 }}</td>
                    <td class="text-center">{{ $sp->name ?? '' }}</td>
                    <td class="text-center">{{ $sp->category_name ?? '' }}</td>
                    <td class="text-center">{{ $sp->price ?? '' }}</td>
                    <td class="text-center">{{ $sp->stock ?? '' }}</td>
                    <td class="text-center">{{ $sp->active ? 'Còn Hàng' : 'Hết Hàng' }}</td>
                    <td class="text-center">
                        <div class="btn-group btn-group-sm" role="group" aria-label="Small button group">
                            <button type="button" class="btn btn-outline-primary">Left</button>
                            <button type="button" class="btn btn-outline-primary">Middle</button>
                            <button type="button" class="btn btn-outline-primary">Right</button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
@section('card-footer')
    <h3>Trang {{ $sanPhams->currentPage() }} / {{ $sanPhams->lastPage() }}</h3>
    {{ $sanPhams->links() }}
@endsection
