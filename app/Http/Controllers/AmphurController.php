<?php

namespace App\Http\Controllers;

use App\Models\Province;
use App\Models\Amphur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AmphurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $this->middleware('auth:api');
        $data = Province::all();
        return view('Amp/index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request, [
                'inputAmp' => 'required|string|max:255',
                'inputPro' => 'required|string|max:255',
        ]);
        
        // store
        $amp = new Amphur;
        $amp->AMPHUR_NAME = $request->input('inputAmp');
        $amp->PROVINCE_ID = $request->input('inputPro');
        $amp->save();
 
        // redirect
        return redirect()->to('/')->with("Text","เพิ่มอำเภอเรียบร้อยแล้ว");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
