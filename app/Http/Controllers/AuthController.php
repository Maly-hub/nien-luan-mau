<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use Hash;
use App\NhanVienModel;
use Auth;

class AuthController extends Controller
{
    public function viewDangKy(){
        return view ('admin.template.register');
    }

    public function xuLyDangKy(Request $request)
    {
        $hoTen = $request->hoTen;
        $sdt = $request->sdt;
        $tenDangNhap = $request->tenDangNhap;
        $matKhau1 = $request->matKhau1;
        $matKhau2 = $request->matKhau2;

        if ($matKhau1 != $matKhau2)
        {
            Session::flash('alert-password','Mật khẩu không trùng khớp');
            return redirect()->back();
        }
        else
        {
            $user = new NhanVienModel();
            $user->nv_hoten = $hoTen;
            $user->nv_sdt = $sdt;
            $user->username = $tenDangNhap;
            $user->password = Hash::make($matKhau1);
            //Save lai
            $user->save();
            return redirect()->route('dang-ky');
            // dd('abc');
        }
    }
    public function viewDangNhap(){
        if(Auth::guard('nhanvien')->check())
        {
            return redirect()->route('san-pham');
        }
        return view ('admin.template.login');
    }

    public function logout()
    {
        Auth::guard('nhanvien')->logout();
        return redirect()->route('login');
    }
    public function xulyDangNhap(Request $request){
        $username = $request->username;
        $password = $request->password;

        $arr = [
            'username' => $username,
            'password' => $password
        ];
        //dd($arr);
        // Auth::guard('khachhang)->attempt()

        if (Auth::guard('nhanvien')->attempt($arr)) {
            //dd("Dang nhap thanh cong");
            return redirect()->route('san-pham');

        } else{
            //Trả về dữ liệu dạng json để ajax lấy chuỗi
            // return respone()->json([
            //     'error' => 'Tài khoản và mật khẩu không chính xác',
            //     'req' => 'Yêu cầu đăng nhập lại'
            // ],200);
            dd ('Tài khoản và mật khẩu không chính xác');
        }
    }
}
