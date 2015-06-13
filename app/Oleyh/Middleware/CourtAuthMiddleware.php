<?php namespace app\Oleyh\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Response;

class CourtAuthMiddleware
{
    public function handle($request, Closure $next)
    {
        if (!Auth::check() || !Auth::user()->isCourtType()) {
            return redirect()->route('login');
        }

        return $next($request);
    }
}
