@extends('layouts.AdminLayout')
@section('title-page')
    Quản Lý Sản Phẩm
@endsection
@section('card-header')
    <h3 class="card-title">Quản Lý Danh Sách Sản Phẩm</h3>
    <div class="card-tools">
        <a href="" class="btn btn-success">Thêm Sản Phẩm</a>
    </div>
@endsection
@section('card-body')
    <h1>Danh sách sản phẩm</h1>
    <table class="table table-striped table-hover align-middle">
        <thead class="table-dark">
            <tr class="text-center">
                <th scope="col">STT</th>
                <th scope="col">Tên Sản Phẩm</th>
                <th scope="col">Giá Sản Phẩm</th>
                <th scope="col">Sản Phẩm Tồn Kho</th>
                <th scope="col">Trạng Thái Sản Phẩm</th>
                <th scope="col">Hành Động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sanPham as $key => $sp)
                <tr>
                    <td class="text-center">{{ $key + 1 }}</td>
                    <td class="text-center">{{ $sp->name ?? '' }}</td>
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
    <h3>Trang {{ $sanPham->currentPage() }} / {{ $sanPham->lastPage() }}</h3>
    {{ $sanPham->links() }}
@endsection
