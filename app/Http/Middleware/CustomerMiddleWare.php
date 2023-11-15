<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;

class CustomerMiddleWare
{
    private $cus;
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check() && Auth::user()->role==0){
            return $next($request);
        }
        return  redirect()->route('login')->with('alert','Bạn cần đăng nhập để thực hiện chức năng này');
    }
}
