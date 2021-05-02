<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckSuperAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role1)
    {
        $user = Auth::user();
        // dd($user->roles[0]->role);
        // dd($request);
        // if ( in_array( $user->roles);
        // if (! $request->user()->hasRole($role)) {
        //     dd('dd');
        // }
        $auth =false;
        if( !$user )
            return redirect('/');
        foreach ($user->roles as $role) {
            if($role->role == $role1){
                $auth =true;
                break;
            }

        }
        
        if(!$auth){
            return redirect('/');
        }
        return $next($request);
    }
}
