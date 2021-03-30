<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Mail\AdminNotificationMail;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

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

         $password = $request->password;
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
        $mail = Mail::to($account->email)->send(new AdminNotificationMail($account , $password));
        return redirect(route('dashboard.admin.index'));
//        return redirect(route('/'))->with('message' , 'Your have Add Admin Successfully');
    }
    public function edit(Request $request){
        $id =  $request->id;
        $admin =  Admin::find($id);
        return $admin;
    }
    public function update(Request $request){
        $admin = Admin::find($request->id);
//        return response()->json(['data' => $request->id]);
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
        ]);
        if ($request->password){
            $data = \request()->validate(['password' => ['required','string','confirmed']]);
            $password = $data['password'];
//            return response()->json(['data' => $password]);

            $admin->update([
                'first_name'      => $request['first_name'],
                'last_name'       => $request['last_name'],
                'username'        => $request['username'],
                'email'           => $request['email'],
                'phone'           => $request['phone'],
                'city'            => $request['city'],
                'state'           => $request['state'],
                'postal_code'     => $request['postal_code'],
                'address'         => $request['address'],
                'password'        => Hash::make($request->password),
            ]);
        }
        else{
            $admin->update([
                'first_name'      => $request['first_name'],
                'last_name'       => $request['last_name'],
                'username'        => $request['username'],
                'email'           => $request['email'],
                'phone'           => $request['phone'],
                'city'            => $request['city'],
                'state'           => $request['state'],
                'postal_code'     => $request['postal_code'],
                'address'         => $request['address'],
            ]);
        }
        return response()->json(['success' => $admin]);
    }
    public function destroy(Request $request){
        $id = $request->id;
        $admin = Admin::find($id);
        $admin->delete();
        return response()->json(['success' => 'Record has been successfully Deleted']);
    }
}
