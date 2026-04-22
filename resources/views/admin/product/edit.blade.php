@extends('admin.layout.master')
@section('content')
<h2>Chỉnh sửa sản phẩm: {{ $product->name }}</h2>
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

    <form action="{{ route('admin.product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Tên sản phẩm*</label>
            <input type="text" name="name" class="form-control" required value="{{ $product->name }}">
        </div>
        <div class="form-group">
            <label>Loại sản phẩm*</label>
            <select name="id_type" class="form-control" required>
                @foreach($types as $t)
                <option value="{{ $t->id }}" {{ $product->id_type == $t->id ? 'selected' : '' }}>{{ $t->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Giá gốc*</label>
            <input type="number" name="unit_price" class="form-control" required value="{{ $product->unit_price }}">
        </div>
        <div class="form-group">
            <label>Giá khuyến mãi</label>
            <input type="number" name="promotion_price" class="form-control" value="{{ $product->promotion_price }}">
        </div>
        <div class="form-group">
            <label>Đơn vị</label>
            <input type="text" name="unit" class="form-control" value="{{ $product->unit }}">
        </div>
        <div class="form-group">
            <label>Sản phẩm mới</label><br>
            <input type="checkbox" name="new" {{ $product->new ? 'checked' : '' }}> Mới
        </div>
        <div class="form-group">
            <label>Hình ảnh hiện tại</label><br>
            <img src="{{ asset('image/product/'.$product->image) }}" width="100" style="margin-bottom: 10px;"><br>
            <label>Thay đổi hình ảnh</label>
            <input type="file" name="image" class="form-control">
        </div>
        <div class="form-group">
            <label>Mô tả</label>
            <textarea name="description" class="form-control" rows="5">{{ $product->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="{{ route('admin.product.list') }}" class="btn btn-default">Hủy</a>
    </form>
</div>
@endsection
