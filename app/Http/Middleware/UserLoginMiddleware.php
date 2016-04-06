<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class UserLoginMiddleware {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {

        if (!Auth::guest() && Auth::user()->activate == 1) {
                       
            return $next($request);
        }

        return redirect('login')->with('status', 
              'Sorry !Please activate your account');
    }
}
