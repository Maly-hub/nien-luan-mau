<div class="col-3 ">
    <ul class="list-group normal-border">
        <li class="list-group-item list-group-item-dark normal-border bg-red"><b>Danh mục sản phẩm</b></li>
        @foreach ($loaiSanPham as $item)
            <li class="list-group-item normal-border"><a href="{{ route('get-product-in-category', ['idCategory'=>$item->l_id]) }}">{{ $item->l_ten }}</a></li>
        @endforeach
      </ul>

    @if (Auth::guard('khachhang')->check())
        <div>
            <ul class="list-group normal-border">
                <li class="list-group-item normal-border">Xin chao, <b>{{ Auth::guard('khachhang')->user()->username }}</b></li>
                <a href="{{  route('donhang-kh',['idCus'=> Auth::guard('khachhang')->id()]) }}"><button class="btn btn-success" type="submit">Đơn hàng</button></a>
                <li class="list-group-item normal-border"><a href="{{ route('logout-kh') }}">Dang xuat</a></li>
            </ul>
        </div>
    @else
        <form action="{{ route('xu-ly-dang-nhap-kh') }}" method="post">
            @csrf
            <ul class="list-group normal-border mt-4">
                <li class="list-group-item list-group-item-dark normal-border bg-red"><b>Đăng nhập</b></li>
                <li class="list-group-item normal-border">
                    <label for="" ><b>Tên đăng nhập</b></label>
                    <input type="text" name="username" id="">
                </li>
                <li class="list-group-item normal-border">
                    <label for=""><b>Mật khẩu</b></label>
                    <input type="password" name="password" id="">
                </li>
                <div class="list-group-item normal-border">
                    <button class="btn btn-primary" type="submit">Đăng nhập</button>
                    <button class="btn btn-success" type="submit">Đăng ký</button>
                </div>
            </ul>
        </form>
    @endif
</div>
