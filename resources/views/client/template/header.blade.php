<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.html">TP-24k</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
        <a class="nav-link" href="{{ route('trang-chu') }}">Trang chủ <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Danh mục sản phẩm
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
            </div>
        </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Tìm kiếm vàng . . " aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
        </form>
    <a href="{{ route('gio-hang') }}" class="btn btn-default" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-shopping-cart"></i>{{ Cart::getTotalquantity() }}</a>
    <a href="{{ route('xoa-gio-hang') }}" class="btn btn-default"><i class="fas fa-trash"></i></a>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Giỏ hàng</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <tr>
                        <th>STT</th>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Đơn giá</th>
                        <th>Giá</th>
                    </tr>
                    @php
                        $stt = 1;
                    @endphp
                    @foreach ($cart as $item)
                        <tr class="sanpham">
                            <td>{{ $stt++ }}</td>
                            <td>{{ $item->name }}</td>
                            <td>
                                {{ $item->quantity }}
                                {{-- <input type="number" value="1" id="coin"> --}}
                            </td>
                            <td>
                                <p id="donGia">{{ number_format($item->price) }}</p>
                            </td>
                            <td>
                            <p id="gia" data-id="1">{{ number_format($item->getPriceSum()) }}</p>
                            </td>
                            <td>
                            <a href="{{ route('xoa-mot-sp-trong-cart', ['idProduct'=>$item->id]) }}" class="btn btn-danger">X</a>
                            </td>
                        </tr>
                    @endforeach

                    <tr>
                    <td colspan="3"><b>Tổng tiền: </b>{{ number_format(Cart::getSubTotal()) }}</td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            <td colspan="1"><a class="btn btn-success" href="{{ route('thanh-toan') }}">Thanh toán</a></td>
            </div>
        </div>
        </div>
    </div>
</nav>
