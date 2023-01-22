<?php

namespace App\Http\Controllers;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // root directory
    public function index(){
        return view('users.main');
    }

    //userlogin
    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
            'role' => 'required'
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                        ->withSuccess('Signed in');
        }

        return withSuccess('Login details are not valid');
    }

    public function registration(Request $request)
    {
        $request->validate([

            'email' => 'required|email|unique:users',
            'role'=> 'required|in:data_entry,data_viewer',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();
        $check = $this->create($data);

        return redirect("/")->withSuccess('have signed-in');
    }


    public function create(array $data)
    {
      return User::create([
        'email' => $data['email'],
        'role' => $data['role'],
        'password' => Hash::make($data['password'])
      ]);
    }

}
