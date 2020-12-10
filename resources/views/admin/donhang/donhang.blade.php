@extends('admin.template.master')
@section('content')
    <div class="row">
        <div class="col-12 text-center">
            <h4>Danh sách đơn hàng</h4>
        </div>
        <div class="col-12">
                <form action="{{ route('tim-kiem-don-hang') }}" method="GET">
                        <div class="row">
                            <input type="text" name="tuKhoa" class="form-control col-md-8" id="exampleInputTenloai" aria-describedby="tenloaiHelp" placeholder="Tìm kiếm theo ...">
                            <select name="thuocTinh" id="">
                                <option value="donHang">Đơn hàng</option>
                                <option value="tenKhachHang">Tên khách hàng</option>
                            </select>
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
                    @foreach ($donHang as $item)
                        <tr>
                            <th scope="row">{{ $item->dh_id }}</th>
                            <td>{{ $item->dh_nguoinhan }}</td>
                            <td>{{ $item->dh_diachi }}</td>
                            <td>{{ $item->dh_sdt }}</td>
                            @if ( $item->trangthai == 1)
                                <td>Đang duyệt</td>
                            @endif
                            @if ( $item->trangthai == 2)
                                <td>Đã duyệt</td>
                            @endif
                            @if ( $item->trangthai == 3)
                                <td>Đang giao</td>
                            @endif
                            @if ( $item->trangthai == 4)
                                <td>Đã giao</td>
                            @endif
                            <td>
                            <a href="{{ route('chi-tiet-don',['idDonHang'=>$item->dh_id]) }}" class="btn btn-success">Chi tiết đơn</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
