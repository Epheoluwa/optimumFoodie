<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        session()->forget('activeUserID');
        return view('login');
    }

    public function loginLogic(Request $request)
    {


        $this->validate($request, [
            'email'   => 'required|email',
            'password'  => 'required|min:3'
        ]);

        $user_data = array(
            'email'  => $request->get('email'),
            'password' => $request->get('password')
        );
    //    var_dump(Auth::user());
        if(Auth::attempt($user_data))
        {
            if(Auth::user()->role == '1') //1 = Admin Login
            {
                // return Auth::user();
                return redirect('admin');
            }
            elseif(Auth::user()->role == '2') // Normal or Default User Login
            {
                return redirect('/getmail');
            }
        }
        else
        {
            return back()->with('error', 'Wrong Login Details');
        }
    }

    public function logoutLogic()
    {
        Auth::logout();
        return redirect('/login');
    }
}
