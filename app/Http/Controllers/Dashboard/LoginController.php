<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    public function login_form(){
        return view('auth.admin-login');
    }
    public function admin_login(Request $request){
        $credentials = $request->only('email', 'password');
        $data = request()->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
//        dd(Auth::attempt([ 'email' => 'khan7mi@gmail.com' , 'password' => 'password']));
        if (Auth::guard('admin')->attempt($credentials)){
            // Authentication passed...
//            return Auth::guard('admin')->user();
//            generate_access_token();
//            return session()->get('access_token');
            return redirect('/dashboard');
        }
        else{
            return redirect()->back()->with('message','Please Check Your Credentials');
        }
    }
    public function distributor_login(){
        // Distributor login
    }
    public function guard()
    {
        return Auth::guard('admin');
    }
}
