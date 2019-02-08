<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['users'] = User::all()->sortByDesc('created_at');
        
        // load the view and pass the user
        return View('add/index', $data);
    }

    public function showChangePasswordForm(){
        return view('auth.changepassword');
    }
}
