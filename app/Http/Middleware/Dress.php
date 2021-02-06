<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Dress
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

        // if (Auth::user()->role_type == 3) {
        //     return redirect()->route('admin.board');
        // }
        // if (Auth::user()->role_type == 0) {
        //     return redirect()->route('normal.board');
        // }
        // if (Auth::user()->role_type == 2) {
        //     return redirect()->route('product.board');
        // }
        if (Auth::user()->role_type == 1) {
            return $next($request);
        }
        $destinations = [
            0 => 'normal.board',
            // 1 => 'dress.board',
            2 => 'product.board',
            3 => 'admin.board'
        ];
        return redirect(route($destinations[Auth::user()->role_type]));
        \abort(403);
    }
}
