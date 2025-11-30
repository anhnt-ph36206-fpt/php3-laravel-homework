@extends('layouts.AdminLayout')
@section('title-page')
    {{ $titlePage }}
@endsection
@section('card-header')
    <h3 class="card-title">{{ $title }}</h3>
    <div class="card-tools">
        <a href="{{ route('danh-sach-san-pham.index') }}" class="btn btn-success">Quay lại Danh Sách Sản Phẩm</a>
    </div>
@endsection
@section('card-body')
    <form action="{{ route('danh-sach-san-pham.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Tên Sản Phẩm</label>
            {{-- Bắn dữ liệu lỗi sang form create sản phẩm --}}
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                value="{{ old('name') }}" placeholder="Nhập vào Tên Sản Phẩm">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Giá Sản Phẩm</label>
            <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price"
                value="{{ old('price') }}" placeholder="Nhập vào Giá Sản Phẩm" step="100">
            {{-- Do đang để step là 100 nên khi gõ -1 vào thì sẽ báo lỗi vì step là 100 nên không thể gõ số âm --}}
            {{-- Bắt buộc giá tiền phải trên 0 --}}
            @error('price')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="stock" class="form-label">Số Lượng Sản Phẩm</label>
            <input type="number" class="form-control @error('stock') is-invalid @enderror" id="stock" name="stock"
                value="{{ old('stock') }}" placeholder="Nhập vào Số Lượng Sản Phẩm">
            @error('stock')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">Danh Mục Sản Phẩm</label>
            <select class="form-select" id="category_id" name="category_id">
                <option value="" selected disabled>----Vui lòng chọn Danh Mục----</option>
                @foreach ($danhMucs as $dm)
                    <option value="{{ $dm->id }}" {{ old('category_id') == $dm->id ? 'selected' : '' }}>
                        {{ $dm->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="active" class="form-label">Trạng Thái Sản Phẩm</label>
            <select class="form-select" id="active" name="active">
                <option value="" selected disabled>----Vui lòng chọn Trạng Thái----</option>
                <option value="0" {{ old('active') == 0 ? 'selected' : '' }}>Dừng bán</option>
                <option value="1" {{ old('active') == 1 ? 'selected' : '' }}>Còn bán</option>
            </select>
        </div>
        <button class="btn btn-success" type="submit">
            Thêm Sản Phẩm
        </button>
    </form>
@endsection
@section('card-footer')
@endsection
