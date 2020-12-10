@extends('admin.template.master')
@section('title')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Loại Sản Phẩm</h1>
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
            <h4>Danh sách loại sản phẩm</h4>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modal">
                Thêm loại
            </button>

            @if (Session::has('capnhat'))
            <p style="color:green" class="text-center">
                {{ Session::get('capnhat') }}
            </p>
            @endif

            @if (Session::has('error'))
            <p style="color:red" class="text-center">
                {{ Session::get('error') }}
            </p>
            @endif

            @if (Session::has('tb'))
            <p style="color:green" class="text-center">
                {{ Session::get('tb') }}
            </p>
            @endif

            @if (Session::has('loi'))
            <p style="color:red" class="text-center">
                {{ Session::get('loi') }}
            </p>
            @endif

        </div>
        {{-- <div class="col-4 text-center">
            <h4>Thêm loại sản phẩm</h4>
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

        </div> --}}
    </div>
    <div class="row">
                <div class="col-12">
                <form action="{{ route('tim-kiem-san-pham') }}" method="GET">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputTenloai">Tìm kiếm</label>
                            <input type="text" name="tuKhoa" class="form-control" id="exampleInputTenloai" aria-describedby="tenloaiHelp" placeholder="Tìm kiếm theo tên...">
                        </div>
                    </form>
                    <table class="table text-center">
                        <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">ID</th>
                            <th scope="col">Tên loại sản phẩm</th>
                            <th scope="col">Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                            @php
                                $i=1;
                            @endphp
                            @foreach ($danhSachLoai as $item)
                                <tr>
                                    <th>{{$i++}}</th>
                                    <th scope="row">{{ $item->l_id }}</th>
                                    <td>{{ $item->l_ten }}</td>
                                    <td>
                                        <a href="{{ route('sua-loai-san-pham', ['id'=> $item->l_id]) }}" class="btn btn-success">Sửa</a>
                                        <a href="{{ route('xoa-loai-san-pham', ['id' => $item->l_id]) }}" class="btn btn-danger" onclick="return xoa()">Xóa</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{-- <div class="col-4">
                    <form action="{{ route('xu-ly-them-loai') }}" method="POST">
                        @csrf
                        <div class="form-group">
                        <label for="exampleInputTenloai">Tên loại</label>
                        <input type="text" name="tenLoai" class="form-control" id="exampleInputTenloai" aria-describedby="tenloaiHelp" placeholder="Nhập tên loại sản phẩm...">
                        </div>
                        <button type="submit" class="btn btn-primary">Thêm</button>
                    </form>
                </div> --}}
    </div>
    <!-- Modal -->
<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('xu-ly-them-loai') }}" method="POST">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm loại sản phẩm</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <div class="col-12 text-center">
                        <h4>Thêm loại sản phẩm</h4>
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
                    </div>
                    <div class="col-12">
                            @csrf
                            <div class="form-group">
                            <label for="exampleInputTenloai">Tên loại</label>
                            <input type="text" name="tenLoai" class="form-control" id="exampleInputTenloai" aria-describedby="tenloaiHelp" placeholder="Nhập tên loại sản phẩm...">
                            </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-primary">Thêm</button>
                </div>
            </div>
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
