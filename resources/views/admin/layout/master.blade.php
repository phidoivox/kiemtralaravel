<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
    <base href="{{ asset('') }}">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <style>
        body { padding-top: 50px; background-color: #f8f9fa; }
        .navbar-inverse { background-color: #0277b8; border: none; }
        .navbar-inverse .navbar-brand, .navbar-inverse .navbar-nav>li>a { color: #fff; }
        .sidebar { background-color: #fff; border-right: 1px solid #ddd; height: calc(100vh - 50px); position: fixed; width: 220px; }
        .sidebar ul { list-style: none; padding: 20px 0; }
        .sidebar ul li a { display: block; padding: 10px 20px; color: #333; text-decoration: none; }
        .sidebar ul li a:hover, .sidebar ul li.active a { background-color: #eee; border-left: 4px solid #0277b8; }
        .main-content { margin-left: 220px; padding: 30px; }
        .card { background: #fff; padding: 20px; border-radius: 4px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); margin-bottom: 20px; }
    </style>
</head>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ route('admin.dashboard') }}">Admin Panel</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{ route('trangchu') }}">Xem Website</a></li>
                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out"></i> Thoát
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                </li>
            </ul>
        </div>
    </nav>

    <div class="sidebar">
        <ul>
            <li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}">
                <a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
            </li>
            <li class="{{ Request::is('admin/sanpham*') ? 'active' : '' }}">
                <a href="{{ route('admin.product.list') }}"><i class="fa fa-shopping-basket"></i> Sản phẩm</a>
            </li>
            <li class="{{ Request::is('admin/loaisanpham*') ? 'active' : '' }}">
                <a href="{{ route('admin.category.list') }}"><i class="fa fa-list"></i> Loại sản phẩm</a>
            </li>
            <li class="{{ Request::is('admin/user*') ? 'active' : '' }}">
                <a href="{{ route('admin.user.list') }}"><i class="fa fa-users"></i> Người dùng</a>
            </li>
            <li class="{{ Request::is('admin/donhang*') ? 'active' : '' }}">
                <a href="{{ route('admin.order.list') }}"><i class="fa fa-file-text-o"></i> Đơn hàng</a>
            </li>
        </ul>
    </div>

    <div class="main-content">
        @yield('content')
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
