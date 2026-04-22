<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f0f2f5; display: flex; align-items: center; justify-content: center; height: 100vh; margin: 0; }
        .login-panel { width: 400px; padding: 40px; background: #fff; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); }
        .login-panel h2 { text-align: center; margin-bottom: 30px; color: #0277b8; font-weight: bold; }
        .btn-primary { background-color: #0277b8; border: none; width: 100%; padding: 12px; font-size: 16px; margin-top: 10px; }
        .btn-primary:hover { background-color: #025a8b; }
        .form-control { height: 45px; border-radius: 4px; }
        .alert { margin-bottom: 20px; }
    </style>
</head>
<body>
    <div class="login-panel">
        <h2>Admin Login</h2>

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('admin.login.post') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="admin@example.com" required autofocus>
            </div>
            <div class="form-group">
                <label for="password">Mật khẩu</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="********" required>
            </div>
            <button type="submit" class="btn btn-primary">Đăng nhập</button>
        </form>
        <div style="margin-top: 20px; text-align: center;">
            <a href="{{ route('trangchu') }}" style="color: #666; text-decoration: none;"><i class="fa fa-arrow-left"></i> Quay lại trang chủ</a>
        </div>
    </div>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</body>
</html>
