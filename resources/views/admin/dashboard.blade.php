@extends('admin.layout.master')
@section('content')
<h2>Dashboard Overview</h2>
<div class="row">
    <div class="col-sm-3">
        <div class="card text-center" style="background-color: #0277b8; color: white;">
            <h3>{{ $product_count }}</h3>
            <p>Sản phẩm</p>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="card text-center" style="background-color: #f39c12; color: white;">
            <h3>{{ $user_count }}</h3>
            <p>Người dùng</p>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="card text-center" style="background-color: #27ae60; color: white;">
            <h3>{{ $type_count }}</h3>
            <p>Loại sản phẩm</p>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="card text-center" style="background-color: #e74c3c; color: white;">
            <h3>{{ $bill_count }}</h3>
            <p>Đơn hàng</p>
        </div>
    </div>
</div>
@endsection
