<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DonHangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function donHang()
    {
        $donHang = DB::table('donhang')->get();
        return view ('admin.donhang.donhang', compact('donHang'));
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
    public function chiTietDonHang($idDonHang)
    {
        //Lay thong tin don hang
        $donHang = DB::table('donhang')->where('dh_id', $idDonHang)->first();

        //Lay thong tin san pham trong don hang
        $sanPhamDonHang = DB::table('chitietdonhang')
            ->join('sanpham','sanpham.sp_id','chitietdonhang.sp_id')
            ->where('chitietdonhang.dh_id', $idDonHang)
            ->get();
            // dd($sanPhamDonHang);
        // Tra ve view
        return view ('admin.donhang.chitietdonhang', compact('donHang','sanPhamDonHang'));

    }

    public function capNhatTrangThai($idDonHang, Request $request)
    {
        $donHang = DB::table('donhang')->where('dh_id', $idDonHang)->update([
            'trangthai' => $request->get('trangThai')
        ]);
        return redirect()->back();
    }

    public function timKiem(Request $request){

        switch ($request->get('thuocTinh')) {
                case 'donHang':
                    # code...
                    $tuKhoa = $request->get('tuKhoa');
                    $search = DB::table('donhang')->where('dh_id',$tuKhoa)->get();
                    //dd($search);
                    return view('admin.donhang.donhangtimduoc', compact('tuKhoa','search'));
                break;

                case 'tenKhachHang':
                    $tuKhoa = $request->get('tuKhoa');
                    $search = DB::table('donhang')->where('dh_nguoinhan','like','%'.$tuKhoa.'%')->get();
                    //dd($search);
                    return view('admin.donhang.donhangtimduoc', compact('tuKhoa','search'));
                break;

                default:
                # code...
                break;
        }
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
}
