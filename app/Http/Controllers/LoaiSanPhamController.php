<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use Session;

class LoaiSanPhamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $danhSachLoai = DB::table('loaisanpham')->get();
        //select from loaisanpham
        return view('admin.loaisanpham.index',compact('danhSachLoai'));
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
            $addLoai = DB::table ('loaisanpham')->insert(
                [
                    'l_ten' => $request->tenLoai
                ]
                );
                Session::flash('alert', 'Thêm thành công');
                //dd('Them thanh cong');
                return redirect()->route('danh-sach-loai');
        } catch (\Throwable $th) {
            //throw $th;
                Session::flash('alert-error','Có lỗi trong quá trình thêm');
                return redirect()->route('danh-sach-loai');
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
        $loaiSanPham = DB::table('loaisanpham')->where('l_id',$id)->first();
        return view('admin.loaisanpham.edit',compact('loaiSanPham'));
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

        try {
            //code...
            $updateLSP = DB::table('loaisanpham')->where('l_id',$id)->update([
                'l_ten' => $request->tenLoai
            ]);
            Session::flash('capnhat','Cập nhật thành công');
            //dd('Sua thanh cong');
            return redirect()->route('danh-sach-loai');
        } catch (\Throwable $th) {
            //throw $th;
            Session::flash('error','Lỗi cập nhật');
            return redirect()->route('danh-sach-loai');
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
        //code...
        $delLoaiSanPham = DB::table('loaisanpham')->where('l_id',$id)->delete();
        Session::flash('tb','Xoa thanh cong');
        return redirect()->route('danh-sach-loai');
        } catch (\Throwable $th) {
            //throw $th;
            Session::flash('loi','Xoa khong thanh cong');
            return redirect()->route('danh-sach-loai');
        }
    }
    public function timKiem(Request $request){
        $tuKhoa = $request->get('tuKhoa');
        $loaiSanPhamTimDuoc = DB::table('loaisanpham')->where('l_ten','like', '%'.$tuKhoa."%")->get();
        //dd($loaiSanPhamTimDuoc);
        return view('admin.loaisanpham.loaisanphamtimduoc', compact('tuKhoa', 'loaiSanPhamTimDuoc'));
    }
}
