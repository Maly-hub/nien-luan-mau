<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class SanPhamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $danhsachLoai = DB::table('loaisanpham')->get();
        $sp = DB::table('sanpham')
                    ->join ('loaisanpham','loaisanpham.l_id','sanpham.l_id')
                    ->get();
        return view('admin.sanpham.index', compact('sp','danhsachLoai'));
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
            try {
                // echo " da vo r nhe!";
                $tensp = $request->tenSanPham;
                $tenLoai = $request->tenLoai;
                $moTa = $request->mota;
                $hinhAnh = $request->hinhanh;
                $gia = $request->giaSanPham;
                $soluong = $request->soLuongSanPham;

                // lấy tên của file upload lên
                if ($hinhAnh != null) {
                $tenHinhAnh = $hinhAnh->getClientOriginalName();
                $hinhAnh->move('hinhanhsanpham', $tenHinhAnh);
                $addSanPham = DB::table('sanpham')->insert(
                    [
                        'sp_ten' =>$tensp,
                        'l_id' =>$tenLoai,
                        'sp_mota' => $moTa,
                        'sp_hinhanh' => $tenHinhAnh,
                        'sp_gia' => $gia,
                        'sp_soluong' => $soluong,
                    ]
                    );
                } else {
                    $addSanPham = DB::table('sanpham')->insert(
                        [
                            'sp_ten' =>$tensp,
                            'l_id' =>$tenLoai,
                            'sp_mota' => $moTa,
                            'sp_gia' => $gia,
                            'sp_soluong' => $soluong,
                        ]
                        );
                }
                Session::flash('alert', 'Thêm thành công');
                return redirect()->route('san-pham');
            } catch (\Throwable $th) {
                Session::flash('alert-error','Có lỗi trong quá trình thêm');
                return redirect()->route('san-pham');
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sanPham = DB::table('sanpham')
                        ->where('sp_id',$id)
                        ->join ('loaisanpham','loaisanpham.l_id','sanpham.l_id')->first();
        return view('admin.sanpham.detail',compact('sanPham'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $danhsachLoai = DB::table('loaisanpham')->get();
        $SanPham = DB::table('sanpham')
        ->where('sp_id',$id)
        ->join ('loaisanpham','loaisanpham.l_id','sanpham.l_id')
        ->first();
        return view('admin.sanpham.edit',compact('SanPham','danhsachLoai'));
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
        //dd('Sua thanh cong');
        $hinhAnh = $request->hinhAnh;
        $tenSanPham = $request->tenSanPham;
        $loaiSanPham = $request->tenLoai;
        $gia = $request->giaSanPham;
        $soluong = $request->soLuongSanPham;

        //Kiểm tra request hình ảnh nhận vào
        //hình ảnh rỗng
        if ($hinhAnh == '')
        {
            $editSanPham = DB::table('sanpham')->where('sp_id',$id)->update(
                [
                    'sp_ten' => $tenSanPham,
                    'l_id' => $loaiSanPham,
                    'sp_gia' => $gia,
                    'sp_soluong' => $soluong
                ]
            );
            return redirect()->route('san-pham');
        }
        //có request hình ảnh
        else{
            $tenHinhAnh = $hinhAnh->getClientOriginalName();
            $hinhAnh->move('hinhanhsanpham', $tenHinhAnh);
            $editSanPham = DB::table('sanpham')->where('sp_id',$id)->update(
                [
                    'sp_ten' => $tenSanPham,
                    'l_id' => $loaiSanPham,
                    'sp_hinhanh' => $tenHinhAnh,
                    'sp_gia' => $gia,
                    'sp_soluong' => $soluong
                ]
            );
            return redirect()->route('san-pham');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $delsp = DB::table('sanpham')->where('sp_id',$id)->delete();
            Session::flash('tb','Xoa thanh cong');
            return redirect()->route('san-pham');
        } catch (\Throwable $th) {
            Session::flash('tb-error','Xoa khong thanh cong');
            return redirect()->route('san-pham');
        }


    }
}
