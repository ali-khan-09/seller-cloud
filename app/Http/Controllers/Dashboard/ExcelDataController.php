<?php

namespace App\Http\Controllers\Dashboard;
use App\Imports\ProductImport;
use Excel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExcelDataController extends Controller
{
    public function test(){

        return view('test-password');
    }
    public function excel(Request $request){
        $path = $request->file('file')->getRealPath();
//        dd($path);

       $test =  Excel::import(new ProductImport, $path);
//       dd($test);

    }
}
