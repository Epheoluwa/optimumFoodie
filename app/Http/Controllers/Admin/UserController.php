<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        
        $update = \App\Models\User::create($request->all());
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
