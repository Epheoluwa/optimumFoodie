<?php

namespace App\Http\Middleware;

use Closure;

class AdminAuth
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function handle($request, Closure $next)
    {
        // if (!\Session::has('user_id')) {
        //     return redirect('login');
        // }else{
        //     $user = \App\Models\User::find(\Session::get('user_id'));
        //     $admin = \App\Models\Admin::where('email',$user->email)->first();
            
        //     if($admin->is_deleted != 0){
        //         \Session::forget('user_id');
        //         \Auth::logout();
        //         return redirect('/');
        //     }
            
        //     \Session::put('admin_role', $admin->role);
        //     \Session::put('admin_id', $admin->id);
        // }
        return $next($request);
    }
}
