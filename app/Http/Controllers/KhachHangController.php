<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Cart;
use Carbon\Carbon;
use DB;
class KhachHangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function xuLyDangNhap(Request $request)
    {
        //2 request nay nhan vao tu ben name cua o input
        $username = $request->username;
        $password = $request->password;

        //2 chu username va password trong dau nhay
        //tuong ung voi hai cot username va password trong bang khach hang cua cac ban
        $arr = [
            'username'=> $username,
            'password'=> $password
        ];

        if (Auth::guard('khachhang')->attempt($arr)) {
            //dd("Dang nhap thanh cong");
            return redirect()->back();

        } else{
            dd ('Tài khoản và mật khẩu không chính xác');
        }
    }

    public function logout()
    {
        Auth::guard('khachhang')->logout();
        return redirect()->back();
    }

    public function payment(){
        //Lay noi dung cua gio hang ra
        if(Auth::guard('khachhang')->check()){
            $cartCollection = Cart::getContent();
            //dd($cartCollection);
            return view('client.template.thanhtoan',compact('cartCollection'));
        }
        else {
            dd('Dang nhap moi duoc thanh toan');
        }
    }

    public function datHang(Request $request)
    {
        $idKhachHang = Auth::guard('khachhang')->id();
        $donHang = DB::table('donhang')->insertGetid(
            [
                'dh_nguoinhan' => $request->nguoiNhan,
                'dh_sdt' => $request->sdt,
                'dh_diachi' => $request->diaChi,
                'dh_tongtien' => Cart::getSubTotal(),
                'trangthai' => 1,
                'kh_id' => $idKhachHang,
                'created_at' => Carbon::now(), //Lay gia tri hien tai
            ]
        );

        $cartCollection = Cart::getContent();
        foreach ($cartCollection as $value) {
            # code...
            $soLuongHienTai = DB::table('sanpham')->where('sp_id', $value->id)->first();
            $soLuongGiam = DB::table('sanpham')->where('sp_id',$value->id)->update(
            [
                'sp_soluong' => $soLuongHienTai->sp_soluong - $value->quantity
            ]
            );

            $chiTietDonHang = DB::table('chitietdonhang')->insert(
                [
                    'dh_id' => $donHang,
                    'sp_id' => $value->id,
                    'ctdh_giatien' => $value->price,
                    'ctdh_soluong' => $value->quantity
                ]
            );
        }
        Cart::clear();
        return redirect()->route('trang-chu');
    }
    public function donHang($idCus) {
        // $idCus = Auth::guard('khachhang')->id();
        $order = DB::table('donhang')->where('kh_id',$idCus)->get();
        // dd ($order);
        return view('client.template.donhang', compact('order'));
    }

    public function kh()
    {
        $khachhang = DB::table('khachhang')->get();
        return view ('admin.khachhang', compact('khachhang'));
    }


}
