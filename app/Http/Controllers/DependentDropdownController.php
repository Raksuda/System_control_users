<?php


namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Amphur;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;


class DependentDropdownController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Province::all()->sortByDesc('PROVINCE_NAME');
        return view('add.create',compact('data'));
    }
    public function destroy($id)
    {
        //
    }
    public function ProAndAm($id)
    {
        $amphur = Amphur::where('PROVINCE_ID', $id)->get();
        return response()->json($amphur);


    }
}