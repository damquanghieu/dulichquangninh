<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function getLogin()
    {
        return view('admin.login');
    }
    public function postLogin(Request $request)
    {

        $email = $request['email'];
        $password = $request['password'];

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return redirect('admin/home');
        } else {
            return redirect()->back()->with('thongbao', 'Sai tên tài khoản hoặc mật khẩu');
        }
    }

    public function logout()
    {
        Auth::logout();
        return view('admin.login');
    }
}
