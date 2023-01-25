<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function usersAdd(){
        return view('backend.new-user');
    }

    public function Addnewusers(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:email',
            'status' => 'required'
        ]);
        if ($validator->fails()) {
            \Session::flash('error', $validator->errors()->first());
            return redirect()->back()->withInput();
        }
        
        $update = \App\Models\Category::create($request->all());
        \Session::flash('success', 'User created successfully!');
        
        return redirect()->back();
    }
}
