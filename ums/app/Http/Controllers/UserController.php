<?php

namespace App\Http\Controllers;
use App\Models\User;
use Hash;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // root directory
    public function index(){
        return view('users.main');
    }

    //userlogin
    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $id = Auth::user()->id;
            $role = Auth::user()->role;
            $email = Auth::user()->email;


            session()->put('id', $id);
            session()->put('role', $role);
            session()->put('email', $email);


            /*here, email is equal to the admin@gmail.com and name is equal to the 'admin' it redirect to the
             '/prescriptions' route. and else it redirect to the '/users' route
            */
            if ($role == "data_entry") {
                return redirect('/operator-dashboard');
            } else {
                return redirect('/viewer-dashboard');
            }
        } else {

            return redirect('/')->withErrors(['Incorrect Login Details.']);
        }
        /*$request->validate([
            'email' => 'required',
            'password' => 'required',
            // 'role' => 'required'
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('data-view-login')
                        ->withSuccess('Signed in');
        }*/

        // return withSuccess('Login details are not valid');
    }
    // public function dashboard()
    // {
    //     if(Auth::check()){
    //         return view('users.dataViewer');
    //     } else{
    //         return view
    //     }

    //     return redirect("index")->withSuccess('are not allowed to access');
    // }


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

        //logout
        public function Logout()
        {

            session()->forget('id');
            session()->forget('role');
            session()->forget('email');
            session()->flush();

            return redirect('/');
        }


}
