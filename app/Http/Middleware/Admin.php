<?php

namespace App\Http\Middleware;

use Closure;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if (Auth::user()->role_type == 3) {
            return redirect()->route('admin.board');
        }
        if (Auth::user()->role_type == 0) {
            return redirect()->route('regular.board');
        }
        if (Auth::user()->role_type == 2) {
            return redirect()->route('product.board');
        }
        if (Auth::user()->role_type == 1) {
            return $next($request);
        }
        \abort(403);
    }
}
