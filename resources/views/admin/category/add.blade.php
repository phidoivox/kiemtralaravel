@extends('admin.layout.master')
@section('content')
<h2>Thêm loại sản phẩm mới</h2>
<div class="card">
    <form action="{{ route('admin.category.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Tên loại*</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Hình ảnh</label>
            <input type="file" name="image" class="form-control">
        </div>
        <div class="form-group">
            <label>Mô tả</label>
            <textarea name="description" class="form-control" rows="5"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Lưu</button>
        <a href="{{ route('admin.category.list') }}" class="btn btn-default">Hủy</a>
    </form>
</div>
@endsection
