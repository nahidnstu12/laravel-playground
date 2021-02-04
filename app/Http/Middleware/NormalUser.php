<?php

namespace App\Http\Middleware;

use Closure;

class NormalUser
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
        if (Auth::user()->role_type == 1) {
            return redirect()->route('dress.board');
        }
        if (Auth::user()->role_type == 2) {
            return redirect()->route('product.board');
        }
        if (Auth::user()->role_type == 0) {
            return $next($request);
        }
        \abort(403);
    }
}
