@extends('layouts.AdminLayout')
@section('content')
    <h1>Danh sách sản phẩm</h1>
    <table class="table table-striped table-hover align-middle">
        <thead class="table-dark">
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên Sản Phẩm</th>
                <th scope="col">Giá Sản Phẩm</th>
                <th scope="col">Sản Phẩm Tồn Kho</th>
                <th scope="col">Trạng Thái Sản Phẩm</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sanPham as $key => $sp)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $sp->name ?? ''}}</td>
                    <td>{{ $sp->price ?? ''}}</td>
                    <td>{{ $sp->stock ?? ''}}</td>
                    <td>{{ $sp->active ? 'Còn Hàng' : 'Hết Hàng' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection