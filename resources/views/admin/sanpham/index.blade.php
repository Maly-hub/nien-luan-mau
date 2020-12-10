@extends('admin.template.master')
@section('title')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Sản Phẩm</h1>
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
        <div class="col-9 text-center">
            <h4>Danh sách sản phẩm</h4>
            @if (Session::has('tb'))
            <p style="color: green" class="text-center">
                {{ Session::get('tb') }}
            </p>
            @endif

            @if (Session::has('tb-error'))
                <p style="color: red" class="text-center">
                    {{ Session::get('tb-error') }}
                </p>
            @endif
            <table class="table text-center">
                <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">ID</th>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Loại</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Số Lượng</th>
                    <th scope="col">Hình ảnh</th>
                    <th scope="col">Thao tác</th>
                </tr>
                </thead>
                <tbody>
                    @php
                        $i=1;
                    @endphp
                    @foreach ($sp as $item)
                        <tr>
                            <th>{{$i++}}</th>
                            <th>{{ $item->sp_id }}</th>
                            <td>{{ $item->sp_ten }}</td>
                            <td>{{ $item->l_ten }}</td>
                            <td>{{ number_format($item->sp_gia) }}</td>
                            <td>{{ $item->sp_soluong }}</td>
                            <td>
                                @if ($item->sp_hinhanh==null)
                                 Chưa có hình ảnh sản phẩm
                                @else
                                    <img src="{{asset('hinhanhsanpham')}}/{{$item->sp_hinhanh}}" style = "width:150px">
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('chi-tiet-san-pham', ['id'=> $item->sp_id]) }}" class="btn btn-primary">Chi tiết</a>
                                <a href="{{ route('sua-san-pham', ['id'=> $item->sp_id]) }}" class="btn btn-success">Sửa</a>
                                <a href="{{ route('xoa-san-pham', ['id' => $item->sp_id]) }}" class="btn btn-danger" onclick="return xoa()">Xóa</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-3">
            <h4>Thêm sản phẩm</h4>
            <!--Thongbao-->
            @if (Session::has('alert'))
                <p style="color: green" class="text-center">
                    {{ Session::get('alert') }}
                </p>
            @endif

            @if (Session::has('alert-error'))
                <p style="color: red" class="text-center">
                    {{ Session::get('alert-error') }}
                </p>
            @endif
            <form action="{{ route('xu-ly-them-sp') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="tensp">Tên Sản Phẩm</label>
                        <input type="text" id="tensp" name="tenSanPham" class="form-control" id="exampleInputTenSanPham" aria-describedby="tenSanPhamHelp" placeholder="Nhập tên sản phẩm...">
                    </div>
                    <div class="form-group">
                        <label for="">Loại Sản Phẩm</label>
                        <select name="tenLoai" id=""class="form-control">
                            @foreach ($danhsachLoai as $item)
                                <option value="{{ $item->l_id }}">{{ $item->l_ten }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="giasp">Giá</label>
                        <input type="text" id="giasp" name="giaSanPham" class="form-control" id="exampleInputTenSanPham" aria-describedby="tenSanPhamHelp" placeholder="Nhập giá sản phẩm...">
                    </div>
                    <div class="form-group">
                        <label for="soluongsp">Số Lượng</label>
                        <input type="text" id="soluongsp" name="soLuongSanPham" class="form-control" id="exampleInputTenSanPham" aria-describedby="tenSanPhamHelp" placeholder="Nhập số lượng sản phẩm...">
                    </div>
                    <label for="moTa">Mô Tả Sản Phẩm</label>
                    <textarea name="mota" id="summernote" cols="32" rows="10"></textarea>
                    <div class="form-group">
                        <label for="hinhAnh">Hình Ảnh</label>
                        <input type="file" name="hinhanh" id="hinhAnh" class="form-control" id="exampleInputTenHinhAnh" aria-describedby="HinhAnhHelp" placeholder="Không tệp nào được chọn...">
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm</button>
            </form>
        </div>
    </div>
    <script>
        function xoa(){
            const a = confirm('Ban co muon xoa loai nay khong ?');
            if (a==true){
                return true;
            }
            return false;
        }
    </script>
@endsection
