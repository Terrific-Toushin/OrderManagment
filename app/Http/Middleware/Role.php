<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        if($request->user()->role !== $role and $request->user()->role === 'admin'){
            return redirect('admin/dashboard');
        } elseif($request->user()->role !== $role and $request->user()->role === 'operator'){
            return redirect('operator/dashboard');
        } elseif($request->user()->role !== $role and $request->user()->role === 'kitchen'){
            return redirect('kitchen/dashboard');
        }
        return $next($request);
    }
}
