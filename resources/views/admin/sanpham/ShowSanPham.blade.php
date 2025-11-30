@extends('layouts.AdminLayout')
@section('title-page')
    {{ $titlePage }}
@endsection
@section('card-header')
    <h3 class="card-title">{{ $title }}</h3>
    <div class="card-tools">
        <a href="{{ route('danh-sach-san-pham.index') }}" class="btn btn-warning">Quay Lại</a>
    </div>
@endsection
@section('card-body')
    <div class="row">
        <div class="col-md-6">
            <table class="table">
                <tr>
                    <th>Tên Sản Phẩm</th>
                    <td>{{ $sanPhams->name ?? '' }}</td>
                </tr>
                <tr>
                    <th>Danh Mục</th>
                    <td>{{ $sanPhams->category_name ?? '' }}</td>
                </tr>
                <tr>
                    <th>Giá Sản Phẩm</th>
                    <td>{{ number_format($sanPhams->price, 0, ',', '.') ?? '' }}</td>
                </tr>
                <tr>
                    <th>Trạng Thái</th>
                    <td>{{ $sanPhams->active == 1 ? 'Còn Hàng' : 'Hết Hàng' ?? '' }}</td>
                </tr>
            </table>
        </div>

        <div class="col-md-6">
            <div class="text-center">
                <h4 class="text-primary">Hình Ảnh Sản Phẩm</h4>
            </div>
        </div>
    </div>
@endsection
@section('card-footer')
@endsection
