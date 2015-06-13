<?php namespace app\Oleyh\Middleware;

use App\Oleyh\Models\AuthToken;
use Closure;
use Illuminate\Http\Response;

class PlayerAuthMiddleware
{
    public function handle($request, Closure $next)
    {

        $token = AuthToken::check($request->input('token'));

        if (!$token) {
            return new Response([
                'errors' => ['INVALID_AUTHENTICATION'],
            ], 401);
        }

        return $next($request);
    }
}
