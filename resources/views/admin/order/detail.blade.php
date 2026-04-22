@extends('admin.layout.master')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="pull-left">
            <h2>Chi tiết đơn hàng #{{ $bill->id }}</h2>
        </div>
        <div class="pull-right">
            <a href="{{ route('admin.order.list') }}" class="btn btn-primary" style="margin-top: 20px;"><i class="fa fa-arrow-left"></i> Quay lại</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-6">
        <div class="card" style="padding: 15px; margin-bottom: 20px;">
            <h4>Thông tin khách hàng</h4>
            <hr>
            <p><strong>Họ tên:</strong> {{ $bill->customer->name }}</p>
            <p><strong>Giới tính:</strong> {{ $bill->customer->gender }}</p>
            <p><strong>Email:</strong> {{ $bill->customer->email }}</p>
            <p><strong>Số điện thoại:</strong> {{ $bill->customer->phone_number }}</p>
            <p><strong>Địa chỉ:</strong> {{ $bill->customer->address }}</p>
            <p><strong>Ghi chú:</strong> {{ $bill->customer->note }}</p>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card" style="padding: 15px; margin-bottom: 20px;">
            <h4>Thông tin hóa đơn</h4>
            <hr>
            <p><strong>Ngày đặt:</strong> {{ $bill->date_order }}</p>
            <p><strong>Tổng tiền:</strong> <span style="color:red; font-weight:bold;">{{ number_format($bill->total) }}đ</span></p>
            <p><strong>Hình thức thanh toán:</strong> {{ $bill->payment }}</p>
            <p><strong>Ghi chú:</strong> {{ $bill->note }}</p>
        </div>
    </div>
</div>

<div class="card">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Sản phẩm</th>
                <th>Hình ảnh</th>
                <th>Số lượng</th>
                <th>Đơn giá</th>
                <th>Thành tiền</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bill->bill_detail as $detail)
            <tr>
                <td>{{ $detail->product ? $detail->product->name : 'Sản phẩm đã bị xóa' }}</td>
                <td>
                    @if($detail->product)
                        <img src="{{ asset('image/product/'.$detail->product->image) }}" width="50" height="50" alt="">
                    @endif
                </td>
                <td>{{ $detail->quantity }}</td>
                <td>{{ number_format($detail->unit_price) }}đ</td>
                <td>{{ number_format($detail->quantity * $detail->unit_price) }}đ</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th colspan="4" class="text-right">Tổng cộng:</th>
                <th>{{ number_format($bill->total) }}đ</th>
            </tr>
        </tfoot>
    </table>
</div>
@endsection
