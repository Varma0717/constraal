<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Throwable;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            try {
                if (\Illuminate\Support\Facades\Auth::guard($guard)->check()) {
                    if ($guard === 'admin') {
                        return redirect('/admin');
                    }
                    return redirect('/account');
                }
            } catch (Throwable $exception) {
                Log::warning('Auth guard check failed in RedirectIfAuthenticated middleware.', [
                    'guard' => $guard,
                    'message' => $exception->getMessage(),
                    'ip_address' => $request->ip(),
                ]);
            }
        }

        return $next($request);
    }
}
