@extends('admin.layout.master')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="pull-left">
            <h2>Quản lý đơn hàng</h2>
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
                <th>Khách hàng</th>
                <th>Ngày đặt</th>
                <th>Tổng tiền</th>
                <th>Thanh toán</th>
                <th>Ghi chú</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bills as $b)
            <tr>
                <td>{{ $b->id }}</td>
                <td>{{ $b->customer ? $b->customer->name : 'N/A' }}</td>
                <td>{{ $b->date_order }}</td>
                <td>{{ number_format($b->total) }}đ</td>
                <td>{{ $b->payment }}</td>
                <td>{{ $b->note }}</td>
                <td>
                    <a href="{{ route('admin.order.detail', $b->id) }}" class="btn btn-xs btn-info" title="Xem chi tiết"><i class="fa fa-eye"></i></a>
                    <a href="{{ route('admin.order.delete', $b->id) }}" class="btn btn-xs btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa đơn hàng này?')" title="Xóa"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="text-center">
        {{ $bills->links() }}
    </div>
</div>
@endsection
