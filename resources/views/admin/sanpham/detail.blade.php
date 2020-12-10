@extends('admin.template.master')
@section('title')
    <div class="container-fluid text-center">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="">Chi tiết sản phẩm</h1>
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
        <div class="container">
            <div class="row">
                <div class="col-6 order-1">
                    <div class="image_selected">
                        <img src="{{ asset('hinhanhsanpham') }}/{{ $sanPham->sp_hinhanh }}" style="width:450px;height:450px">
                    </div>
                </div>
                <!-- Description -->
                <div class="col-6 order-2">
                    <div class="product_description">
                        <div class="product_name">Tên sản phẩm: {{ $sanPham->sp_ten }}</div></br>
                        <div class="product_price">Giá Sản Phẩm: {{ $sanPham->sp_gia }}</div></br>
                        <div class="product_number">Số Lượng Sản Phẩm: {{ $sanPham->sp_soluong }}</div></br>
                        <!-- <h4><b>Thông tin chi tiết :</b> </h4> -->
                            {{-- {{-- <div class="product_price">
                                <label for="">Giá :</label>
                                    {{ $sanPham->ma_gia}} VND</br>
                                <label for="">Loại :</label>
                                    {{ $sanPham->l_ten }}
                            </div>
                            </br>
                            <div class="buttons_added mt-3">
                                <div class="number">Số lượng</div>
                                <div>
                                    <input class="minus is-form" type="button" value="-">
                                    <input aria-label="quantity" class="input-qty" max="20" min="1"  value="1" name="" type="number" value="">
                                    <input class="plus is-form" type="button" value="+">
                                </div>
                            </div>--> --}}
                            <div>
                                <button type="button" class="btn btn-primary mt-3"><i class="fa fa-shopping-cart" aria-hidden="true"></i>  Thêm vào giỏ</button>
                                <button   type="button" class="btn btn-danger mt-3 ml-3" >Mua ngay</button>
                            </div>
                            <div >
                                <div class="btn btn-success mt-5" >
                                     <a href="{{ route('san-pham') }}" style="color:honeydew">
                                        <i class="fa fa-undo" aria-hidden="true"></i>  Trở về
                                    </a>
                                </div>
                            </div>
                            </br>
                        </div>
                    </div>
                    <div class="col-12 mt-5 order-3">
                        <h4><b>Mô tả sản phẩm:</b> </h4>
                        <p>{!! $sanPham->sp_mota !!}</p>
                    </div>
                </div>
            </div>
        </div>



    @endsection

    {{-- @push('script')
    <script>
        $('input.input-qty').each(function() {
      var $this = $(this),
        qty = $this.parent().find('.is-form'),
        min = Number($this.attr('min')),
        max = Number($this.attr('max'))
      if (min == 0) {
        var d = 0
      } else d = min
      $(qty).on('click', function() {
        if ($(this).hasClass('minus')) {
          if (d > min) d += -1
        } else if ($(this).hasClass('plus')) {
          var x = Number($this.val()) + 1
          if (x <= max) d += 1
        }
        $this.attr('value', d).val(d)
      })
    })
    </script>
    @endpush --}}



