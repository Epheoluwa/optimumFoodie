<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function usersAdd(){
        $data['user'] = \App\Models\User::all();
        return view('backend.new-user', $data);
    }

    public function Addnewusers(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'status' => 'required'
        ]);
        if ($validator->fails()) {
            \Session::flash('error', $validator->errors()->first());
            return redirect()->back()->withInput();
        }
        $random_password = Str::random(10);
        $data = $request->all();
        $userdetails = [
            'name' => $data['name'],
            'email' => $data['email'],
            'status' => $data['status'],
            'password' => $random_password,
        ];
        
        $update = \App\Models\User::create($userdetails);
        \Session::flash('success', 'User created successfully!');
        
        return redirect()->back();
    }

    public function Editusers(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'status' => 'required'
        ]);
        if ($validator->fails()) {
            \Session::flash('error', $validator->errors()->first());
            return redirect()->back()->withInput();
        }

        $update = \App\Models\User::whereId($id)->update($request->except('_token'));
        \Session::flash('success', 'User updated successfully!');
        
        return redirect()->back();
    }
}
