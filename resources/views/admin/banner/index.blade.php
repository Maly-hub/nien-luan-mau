@extends('admin.template.master')
@section('title')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Banner</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
          <li class="breadcrumb-item active">Banner</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
@endsection

@section('content')
<form action="{{ route('xu-ly-banner') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if (Session::has('alert'))
                <p style="color:green" class="text-center">
                    {{ Session::get('alert') }}
                </p>
            @endif

            @if (Session::has('alert-error'))
                <p style="color:red" class="text-center">
                    {{ Session::get('alert-error') }}
                </p>
            @endif
    <label for="moTa">Mô Tả Banner</label>
    <textarea name="mota" id="summernote" cols="32" rows="10"></textarea>
    <div class="form-group">
        <label for="hinhAnh">Hình Ảnh</label>
        <input type="file" name="hinhanh" id="hinhAnh" class="form-control" id="exampleInputTenHinhAnh" aria-describedby="HinhAnhHelp" placeholder="Không tệp nào được chọn...">
    </div>
    <button type="submit" class="btn btn-primary">Thêm</button>
</form>
@endsection
