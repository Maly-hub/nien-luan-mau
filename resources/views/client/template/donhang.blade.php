@extends('client.template.master')
@section('content')
    <div class="row">
        <div class="col-12 text-center">
            <h4>Đơn hàng</h4>
        </div>
        <div class="col-12">
            <form action="" method="GET">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputTenloai">Đơn hàng</label>
                        {{-- <input type="text" name="tuKhoa" class="form-control" id="exampleInputTenloai" aria-describedby="tenloaiHelp" placeholder="Tìm kiếm theo tên..."> --}}
                    </div>
            </form>
            <table class="table text-center">
                <thead>
                <tr>
                    <th scope="col">Mã đơn</th>
                    <th scope="col">Người nhận</th>
                    <th scope="col">Địa chỉ</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Trạng thái</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($order as $item)
                        <tr>
                            <th scope="row">{{ $item->dh_id }}</th>
                            <td>{{ $item->dh_nguoinhan }}</td>
                            <td>{{ $item->dh_diachi }}</td>
                            <td>{{ $item->dh_sdt }}</td>
                            @if ( $item->trangthai == 1)
                                <td>Chưa duyệt</td>
                            @endif
                            @if ( $item->trangthai == 2)
                                <td>Đã duyệt</td>
                            @endif
                            @if ( $item->trangthai == 3)
                                <td>Đã giao</td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
