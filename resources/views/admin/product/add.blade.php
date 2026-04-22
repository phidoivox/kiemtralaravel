@extends('admin.layout.master')
@section('content')
<h2>Thêm sản phẩm mới</h2>
<div class="card">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Tên sản phẩm*</label>
            <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
        </div>
        <div class="form-group">
            <label>Loại sản phẩm*</label>
            <select name="id_type" class="form-control" required>
                @foreach($types as $t)
                <option value="{{ $t->id }}">{{ $t->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Giá gốc*</label>
            <input type="number" name="unit_price" class="form-control" required value="{{ old('unit_price') }}">
        </div>
        <div class="form-group">
            <label>Giá khuyến mãi</label>
            <input type="number" name="promotion_price" class="form-control" value="{{ old('promotion_price') }}">
        </div>
        <div class="form-group">
            <label>Đơn vị (VD: cái, hộp, cái)</label>
            <input type="text" name="unit" class="form-control" value="{{ old('unit') }}">
        </div>
        <div class="form-group">
            <label>Sản phẩm mới</label><br>
            <input type="checkbox" name="new" checked> Mới
        </div>
        <div class="form-group">
            <label>Hình ảnh*</label>
            <input type="file" name="image" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Mô tả</label>
            <textarea name="description" class="form-control" rows="5">{{ old('description') }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Lưu sản phẩm</button>
        <a href="{{ route('admin.product.list') }}" class="btn btn-default">Hủy</a>
    </form>
</div>
@endsection
