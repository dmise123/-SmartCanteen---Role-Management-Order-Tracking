<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SavePreviousUrl
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->method() === 'GET' && !$request->ajax()) {
            session(['previous_url' => url()->previous()]);
        }

        return $next($request);
    }
}

