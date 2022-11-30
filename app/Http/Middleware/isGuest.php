<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class isGuest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
            //cek kalu di fitur auth ada history login, di perbolhkan akses
            if(Auth::check()) {
                return redirect()->route('todo.index')->with('notAllowed','Anda Sudah Login !');
                }
        
                //kalu ga ada history login bakal dibalikin ke halaman login dengan pesan error
                return $next($request);
                
    }
}
