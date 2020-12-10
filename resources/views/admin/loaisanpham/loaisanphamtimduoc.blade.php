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
            <h4>Loại sản phẩm tìm được theo từ khóa: {{ $tuKhoa }}</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
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
                    @foreach ($loaiSanPhamTimDuoc as $item)
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
