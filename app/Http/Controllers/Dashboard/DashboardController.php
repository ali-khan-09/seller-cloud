<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Distributer;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $totalProducts = Product::all()->count();
        $totalDistributors = Distributer::all()->count();
        $totalAdmins = Admin::all()->count();
        return view('dashboard.index' , compact('totalProducts','totalDistributors','totalAdmins'));
    }
}
