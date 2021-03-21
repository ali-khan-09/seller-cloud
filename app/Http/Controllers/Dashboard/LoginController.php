<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login_form(){
        return view('auth.admin-login');
    }
    public function login(Request $request){
//        dd($request->all());
        $credentials = $request->only('email', 'password');
        $data = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect('/dashboard');
        }
        else{
            return redirect()->back()->with('message','Please Check Your Credentials');
        }
    }
}
