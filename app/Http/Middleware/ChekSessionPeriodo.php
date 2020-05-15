<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class ChekSessionPeriodo
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
        if ( !Session::has('periodoactual') ) {
            return redirect()->route('config.seleccionar.periodo');
        }
        return $next($request);
    }
}
