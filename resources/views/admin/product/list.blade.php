@extends('admin.layout.master')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="pull-left">
            <h2>Danh sách sản phẩm</h2>
        </div>
        <div class="pull-right">
            <a href="{{ route('admin.product.add') }}" class="btn btn-success" style="margin-top: 20px;"><i class="fa fa-plus"></i> Thêm sản phẩm</a>
        </div>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

<div class="card">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Hình ảnh</th>
                <th>Tên sản phẩm</th>
                <th>Loại</th>
                <th>Giá</th>
                <th>Giá KM</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $p)
            <tr>
                <td>{{ $p->id }}</td>
                <td><img src="{{ asset('image/product/'.$p->image) }}" width="50" height="50" alt=""></td>
                <td>{{ $p->name }}</td>
                <td>{{ $p->product_type ? $p->product_type->name : 'N/A' }}</td>
                <td>{{ number_format($p->unit_price) }}đ</td>
                <td>{{ number_format($p->promotion_price) }}đ</td>
                <td>
                    <a href="{{ route('admin.product.edit', $p->id) }}" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>
                    <a href="{{ route('admin.product.delete', $p->id) }}" class="btn btn-xs btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="text-center">
        {{ $products->links() }}
    </div>
</div>
@endsection
