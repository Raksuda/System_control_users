<?php

namespace App\Http\Controllers;
use App\Models\Province;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    public function index()
    {
    	return view('Pro/index');   
    }

    public function store(Request $request)
    {
        $this->middleware('auth');
        $this->validate($request, [
                'inputPro' => 'required|string|max:255',
        ]);
        
        // store
        $pro = new Province;
        $pro->PROVINCE_NAME = $request->input('inputPro');
        $pro->save();
 
        // redirect
        return redirect()->to('/')->with("Text","เพิ่มจังหวัดเรียบร้อยแล้ว");
    }
}
