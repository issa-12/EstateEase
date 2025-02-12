<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckAgent
{
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::user()->requests->count()!=0){
            return to_route('home');
        }
        return $next($request);
    }
}
