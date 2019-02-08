<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Province;
use App\Models\Amphur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        
        $data['users'] = User::all()->sortByDesc('created_at');
        
        // load the view and pass the user
        return View('add/index', $data);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return View('add/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $this->validate($request, [
                'inputName' => 'required|string|max:150',
                'inputLast' => 'required|string',
                'inputTel' => 'required|string',
                'inputMail' => 'required|string',
                'inputAddress' => 'required|string',
                'inputZipcode' => 'required|string',
                'inputConfirmPassword' => 'required|same:inputPassword|min:6',
                'inputPassword' => 'required|string|min:6',
                'inputProvince' => 'required|int',
                'inputAmphur' => 'required|int',
        ]);

        // store
        $user = new User;
        $user->firstname = $request->input('inputName');
        $user->lastname = $request->input('inputLast');
        $user->mobile = $request->input('inputTel');
        $user->email = $request->input('inputMail');
        $user->address = $request->input('inputAddress');
        $user->zipcode = $request->input('inputZipcode');
        $user->password = bcrypt($request->input(['inputPassword']));
        $user->province_id = $request->input('inputProvince');
        $user->amphur_id = $request->input('inputAmphur');
        $user->save();
 
        // redirect
        return redirect()->to('/')->with("Text","เพิ่มข้อมูลเรียบร้อยแล้ว");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // get the blog
        $data = User::findOrFail($id);
 
        // show the view and pass the blog to it
        return View('add/index')
            ->with('addU', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          // get the blog
        $data['user'] = User::find($id);
        $data['province'] = Province::all()->sortByDesc('PROVINCE_NAME');
        $data['amphur'] = Amphur::where('PROVINCE_ID','=',$data['user']->province_id)->orderBy('AMPHUR_NAME', 'asc')->get();
        //dd($provn);
        //exit();
 
        // show the edit form and pass the blog
        return View('add/edit', $data);
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
        //dd($request->all());
       
        $this->validate($request, [
                'inputName' => 'required|string|max:150',
                'inputLast' => 'required|string',
                'inputTel' => 'required|string',
                'inputMail' => 'required|string',
                'inputAddress' => 'required|string',
                'inputZipcode' => 'required|string',
                'inputProvince' => 'required|int',
                'inputAmphur' => 'required|int',
        ]);
       
        $user = User::findOrFail($id);
        $user->firstname = $request->input('inputName');
        $user->lastname = $request->input('inputLast');
        $user->mobile = $request->input('inputTel');
        $user->email = $request->input('inputMail');
        $user->address = $request->input('inputAddress');
        $user->zipcode = $request->input('inputZipcode');
        $user->province_id = $request->input('inputProvince');
        $user->amphur_id = $request->input('inputAmphur');
        $user->save();
 
        // redirect
        return redirect()->to('/')->with("Text","อัพเดตข้อมูลเรียบร้อยแล้ว");
    }

    public function changePassword(Request $request){

        //dd($request);


        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }
        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){

            //Current password and new password are same
            return redirect()->back()->with("error","รหัสผ่านใหม่ของคุณ ต้องไม่เหมือนกับรหัสเก่า กรุณาใส่รหัสผ่านอีกครั้ง");
        }

        $this->validate($request, [
            'new-password' => 'min:6|required_with:new-password_confirmation|same:new-password_confirmation',
            'new-password_confirmation' => 'required|min:6',
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->to('/')->with("Text","คุณได้เปลี่ยนรหัสผ่านแล้ว");
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

    public function find()
    {
        $data = input::get('word');

        //dd($data);
        $fnd['users'] = User::where ( 'firstname', 'LIKE', '%' . $data . '%' )
                    ->orWhere ( 'lastname', 'LIKE', '%' . $data . '%' )
                    ->orWhere ( 'mobile', 'LIKE', '%' . $data . '%' )
                    ->orWhere ( 'email', 'LIKE', '%' . $data . '%' )
                    ->orderByDesc('created_at')
                    ->get ();
        // $fnd = [
        //     'users' => $fnd['users']
        // ];
        // $fnd['users'] = $fnd['users'];
        
                        if (count ( $fnd ) > 0)
                            return view ( 'add/index' )->with($fnd);
                        else
                            return view ( 'add/index' )->with("Text","คุณได้เปลี่ยนรหัสผ่านแล้ว");

        /*return View('add/index')
            ->with('addU', $data);*/
    }
}
