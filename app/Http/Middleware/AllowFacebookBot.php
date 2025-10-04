<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AllowFacebookBot
{
    public function handle(Request $request, Closure $next)
    {
        $userAgent = $request->header('User-Agent');

        if (app()->environment('production') && (
                str_contains($userAgent, 'facebookexternalhit') ||
                str_contains($userAgent, 'Facebot')
            )) {
            return response('<html><head><meta name="robots" content="noindex"></head><body>Facebook Bot OK</body></html>', 200)
                ->header('Content-Type', 'text/html');
        }

        return $next($request);
    }
}