<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  @include('admin.template.css')
</head>
<body class="hold-transition login-page" style="background-image: url('https://previews.123rf.com/images/photobyphotoboy/photobyphotoboy1709/photobyphotoboy170900121/86673580-multi-color-sneakers-on-wood-background.jpg')">
<div class="login-box">
  <div class="card">
    <div class="card-body login-card-body">
        <p class="login-box-msg">Register a new membership</p>

    <form action="{{ route('xu-ly-dang-ky') }}" method="POST">
        @csrf
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Họ tên" name="hoTen">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Tên đăng nhập" name="tenDangNhap">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Số điện thoại" name="sdt">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Mật khẩu" name="matKhau1">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Nhập lại mật khẩu" name="matKhau2">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Đăng ký</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
        <p class="mb-1 mt-2">
            <a href="{{ route('login') }}" class="btn btn-success">Đăng nhập</a>
        </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

@include('admin.template.js')

</body>
</html>
