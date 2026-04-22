@extends('admin.layout.master')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <h2>Danh sách người dùng</h2>
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
                <th>Họ tên</th>
                <th>Email</th>
                <th>Quyền</th>
                <th>Ngày tạo</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $u)
            <tr>
                <td>{{ $u->id }}</td>
                <td>{{ $u->full_name }}</td>
                <td>{{ $u->email }}</td>
                <td>
                    @if($u->level == 1)
                        <span class="label label-danger">Admin</span>
                    @else
                        <span class="label label-info">User</span>
                    @endif
                </td>
                <td>{{ $u->created_at }}</td>
                <td>
                    <a href="{{ route('admin.user.delete', $u->id) }}" class="btn btn-xs btn-danger" onclick="return confirm('Bạn chắc chắn muốn xóa người dùng này?')"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="text-center">
        {{ $users->links() }}
    </div>
</div>
@endsection
