<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function registration_form(){
        return view('dashboard.auth.admin-registration');
    }
    public function register(){
        $data = \request()->validate([
            'first_name'  => ['required',],
            'last_name'   => ['required',],
            'email'       => ['required'|'email',],
            'phone'       => ['required',],
            'city'        => ['required',],
            'state'       => ['required',],
            'Postal Code' => ['required',],
            'password'    => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }
}
