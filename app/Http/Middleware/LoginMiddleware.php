<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class LoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // if()
        if (!Auth::check() || auth::user()->role !== config('contast.Admin')) {
            return redirect()->route('formLoginAdmin')->with('error', 'đăng nhập thất bại');
        } else {
            // return redirect()->route('admin/prouct')->with('error', 'đăng nhập thành công');
            return $next($request);
            
        }
        
    }

}
