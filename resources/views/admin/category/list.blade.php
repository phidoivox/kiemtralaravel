@extends('admin.layout.master')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="pull-left">
            <h2>Danh sách loại sản phẩm</h2>
        </div>
        <div class="pull-right">
            <a href="{{ route('admin.category.add') }}" class="btn btn-success" style="margin-top: 20px;"><i class="fa fa-plus"></i> Thêm loại mới</a>
        </div>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Hình ảnh</th>
                <th>Tên loại</th>
                <th>Mô tả</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $c)
            <tr>
                <td>{{ $c->id }}</td>
                <td><img src="{{ asset('image/product/'.$c->image) }}" width="50" height="50" alt=""></td>
                <td>{{ $c->name }}</td>
                <td>{{ Str::limit($c->description, 100) }}</td>
                <td>
                    <a href="{{ route('admin.category.delete', $c->id) }}" class="btn btn-xs btn-danger" onclick="return confirm('Xóa loại sản phẩm sẽ ảnh hưởng đến các sản phẩm thuộc loại này. Bạn chắc chắn?')"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="text-center">
        {{ $categories->links() }}
    </div>
</div>
@endsection
