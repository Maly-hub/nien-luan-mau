@extends('client.template.master')
@section('content')
     <!-- slider -->
     <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="{{ asset('client-template') }}/assets/img/thiet-ke-web-vang-bac-da-quy-800x400.png" alt="First slide" style="height: 350px;">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="{{ asset('client-template') }}/assets/img/thiet-ke-website-vang-bac-da-quy.jpg" alt="Second slide" style="height: 350px;">
        </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
        </a>
    </div>

    <!-- Hiển thị sản phẩm -->
    <div class="row mt-5">
        <div class="col-12">
            <h5 class="text-center">Vàng bán chạy</h5>
        </div>
        @foreach ($SanPham as $item)
        <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
            <img class="card-img-top" src="{{ asset('hinhanhsanpham') }}/{{ $item->sp_hinhanh }}" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22348%22%20height%3D%22226%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20348%20226%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_173b4f45847%20text%20%7B%20fill%3A%23eceeef%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A17pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_173b4f45847%22%3E%3Crect%20width%3D%22348%22%20height%3D%22226%22%20fill%3D%22%2355595c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22116.7109375%22%20y%3D%22120.6875%22%3EThumbnail%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true">
            <div class="card-body">
            <p class="card-text"><a href="single.html">Tên: {{ $item->sp_ten }}</a></p>
            <p class="card-text"><a href="single.html">Giá: {{ $item->sp_gia }}</a></p>
            <p class="card-text">
                <a href="single.html">
                    Số lượng: {{ $item->sp_soluong }}
                    @if ($item->sp_soluong <= 0)
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <a type="button" class="btn btn-danger add-to-cart" disabled>Hết hàng</a>
                            <a href="{{ route('chi-tiet-san-pham-kh', ['id'=> $item->sp_id]) }}" type="button" class="btn btn-sm btn-outline-secondary">Chi tiết</a>
                        </div>
                    </div>

                        @else
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="{{ route('them-vao-gio-hang', ['idProduct'=>$item->sp_id]) }}" type="button" class="btn btn-sm btn-outline-secondary add-to-cart">Thêm vào giỏ hàng</a>
                                    <a href="{{ route('chi-tiet-san-pham-kh', ['id'=> $item->sp_id]) }}" type="button" class="btn btn-sm btn-outline-secondary">Chi tiết</a>
                                </div>
                            </div>

                    @endif

                </a>
            </p>

            </div>
            </div>
        </div>
        @endforeach
        {{-- <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
            <img class="card-img-top" src="{{ asset('client-template') }}/assets/img/products/gold-2.jpg" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22348%22%20height%3D%22226%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20348%20226%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_173b4f45847%20text%20%7B%20fill%3A%23eceeef%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A17pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_173b4f45847%22%3E%3Crect%20width%3D%22348%22%20height%3D%22226%22%20fill%3D%22%2355595c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22116.7109375%22%20y%3D%22120.6875%22%3EThumbnail%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true">
            <div class="card-body">
                <p class="card-text"><a href="single.html">Vàng cây</a></p>
                <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-secondary add-to-cart">Thêm vào giỏ hàng</button>
                    <button type="button" class="btn btn-sm btn-outline-secondary">Chi tiết</button>
                </div>
                </div>
            </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
            <img class="card-img-top" src="{{ asset('client-template') }}/assets/img/products/nha-ban-son-tra-da-nang-1811836191_1_cafeland.vn.png" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22348%22%20height%3D%22226%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20348%20226%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_173b4f45847%20text%20%7B%20fill%3A%23eceeef%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A17pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_173b4f45847%22%3E%3Crect%20width%3D%22348%22%20height%3D%22226%22%20fill%3D%22%2355595c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22116.7109375%22%20y%3D%22120.6875%22%3EThumbnail%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true">
            <div class="card-body">
                <p class="card-text"><a href="single.html">Vàng nguyên khối</a></p>
                <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-secondary add-to-cart">Thêm vào giỏ hàng</button>
                    <button type="button" class="btn btn-sm btn-outline-secondary">Chi tiết</button>
                </div>
                </div>
            </div>
            </div>
        </div> --}}
    </div>
@endsection
