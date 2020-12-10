@extends('admin.template.master')
@section('title')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"></h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Dashboard v1</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
@endsection

@section('content')
                <div class="row">
                    <div class="col-12 text-center">
                        <h4>Sửa sản phẩm {{ $SanPham->sp_id }}</h4>
                        @if (Session::has('capnhatsp'))
                        <p style="color: red" class="text-center">
                            {{ Session::get('error-capnhatsp') }}
                        </p>
                        @endif
                    </div>
                    <div class="col-12">
                        <form action="{{ route('xu-ly-sua-sp', ['id'=>$SanPham->sp_id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                            <label for="exampleInputTenloai">Tên Sản Phẩm</label>
                            <input type="text" autocomplete="off" value="{{ $SanPham->sp_ten }}" name="tenSanPham"  class="form-control" id="exampleInputTenloai" aria-describedby="tenloaiHelp" placeholder="Nhập tên loại sản phẩm...">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputTenloai">Loại Sản Phẩm</label>
                                <select name="tenLoai" id=""class="form-control">
                                    @foreach ($danhsachLoai as $item)
                                        {{-- <option value="{{ $item->l_id }}">{{ $item->l_ten }}</option> --}}
                                        <option value="{{ $item->l_id }}" {{ $SanPham->l_id == $item->l_id ? 'selected' : ''}}>{{ $item->l_ten }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <label for="hinhAnh">Hình Ảnh</label></br>
                            <img src="{{asset('hinhanhsanpham')}}/{{$SanPham->sp_hinhanh}}" style = "width:150px"></br></br>
                            <input type="file" name="hinhanh" id="hinhAnh" class="form-control" id="exampleInputTenHinhAnh" aria-describedby="HinhAnhHelp" placeholder="Không tệp nào được chọn...">
                            <div class="form-group">
                                <label for="exampleInputTenloai">Giá Sản Phẩm</label>
                                <input type="text" autocomplete="off" value="{{ $SanPham->sp_gia }}" name="giaSanPham"  class="form-control" id="exampleInputTenloai" aria-describedby="tenloaiHelp" placeholder="Nhập tên loại sản phẩm...">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputTenloai">Số Lượng Sản Phẩm</label>
                                <input type="text" autocomplete="off" value="{{ $SanPham->sp_soluong }}" name="soLuongSanPham"  class="form-control" id="exampleInputTenloai" aria-describedby="tenloaiHelp" placeholder="Nhập tên loại sản phẩm...">
                            </div>
                            <button type="submit" class="btn btn-primary">Sửa</button>
                        </form>
                    </div>
                </div>
@endsection
