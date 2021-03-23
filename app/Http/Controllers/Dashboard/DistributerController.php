<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Distributer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class DistributerController extends Controller
{
	public function index()
	{
		$distributer = Distributer::all();
        return view('dashboard.distributer.index' , compact('distributer'));
	}
    public function distributer_form()
    {
    	return view('dashboard.distributer.distributer_registration');
    }

    public function register(Request $request)
    {
         $data = $request -> validate([
              'name'     	=> ['required'],
              'username' 	=> ['required'],
              'email'    	=> ['required'],
              'phone'    	=> ['required'],
              'address'  	=> ['required'],
              'city'     	=> ['required'],
              'state'    	=> ['required'],
              'postal_code' => ['required'],
              'password'    => ['required','string','confirmed'] 
      ]);

       $account = Distributer::create([
            'name' => $data['name'],
            'username'   => $data['username'],
            'email'      => $data['email'],
            'phone'      => $data['phone'],
            'city'       => $data['city'],
            'state'      => $data['state'],
            'postal_code'=> $data['postal_code'],
            'address'    => $data['address'],
            'password'   => Hash::make($data['password']),
        ]);
       return 'Distributer registered';
    }
}
