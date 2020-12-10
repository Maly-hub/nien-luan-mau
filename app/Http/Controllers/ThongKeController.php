<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
class ThongKeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Thống kê đơn hàng theo từng tháng
        $thongKeDonHang = array();
        for ($i=1; $i<=12; $i++){
            $donHangTheoThang = DB::table('donhang')->whereMonth('created_at', $i)->count();
            array_push($thongKeDonHang, $donHangTheoThang);
        }
        // Thống kê doanh thu từng tháng
        $thongKeDoanhThu = array();
        for ($i=1; $i <= 12; $i++){
            $doanhThuTheoThang = DB::table('donhang')->whereMonth('created_at',$i)
                                ->where('trangthai',4)->sum('dh_tongtien');
            array_push( $thongKeDoanhThu, $doanhThuTheoThang);
        }
        // Đơn hàng mới
        $donHangMoi = DB::table('donhang')->where('trangthai', 1)->count();
        // Đơn hàng đã giao
        $donHangDaGiao = DB::table('donhang')->where('trangthai', 4)->count();
        // Doanh thu tháng hiện tại
        $tongDoanhThuThang = DB::table('donhang')->where('trangthai',4)
                            ->whereMonth('created_at',Carbon::now()->month)
                            ->sum('dh_tongtien');
        $khachHang = DB::table('khachhang')
                        ->whereMonth('created_at',Carbon::now()->month)
                        ->count();
        return view('admin.thongke', compact('donHangMoi', 'donHangDaGiao','tongDoanhThuThang','khachHang','thongKeDonHang','thongKeDoanhThu'));
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
}
