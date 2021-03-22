<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(){
        $admin = Admin::all();
        return view('dashboard.admin.index' , compact('admin'));
    }
    public function registration_form(){
        return view('dashboard.auth.admin-registration');
    }
    public function register(Request $request){
//        dd(\request()->all());
        $data = $request->validate([
            'first_name'  => ['required'],
            'last_name'   => ['required'],
            'username'    => ['required'],
            'email'       => ['required'],
            'phone'       => ['required'],
            'city'        => ['required'],
            'state'       => ['required'],
            'address'     => ['required'],
            'postal_code' => ['required'],
            'password'    => ['required','string','confirmed'],
        ]);
//        return  \request()->all();
        $account = Admin::create([
            'first_name' => $data['first_name'],
            'last_name'  => $data['last_name'],
            'username'   => $data['username'],
            'email'      => $data['email'],
            'phone'      => $data['phone'],
            'city'       => $data['city'],
            'state'      => $data['state'],
            'postal_code'=> $data['postal_code'],
            'address'    => $data['address'],
            'password'   => Hash::make($data['password']),
        ]);

        // Sending Mail to Account Created

        return 'User register';
//        return redirect(route('/'))->with('message' , 'Your have Add Admin Successfully');
    }
    public function edit($id){
        return view('dashboard.edit');
    }
}
