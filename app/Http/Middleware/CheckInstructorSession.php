<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class CheckInstructorSession
{
    public function handle($request, Closure $next)
    {
        if (!Session::has('user_id')) {
            return redirect('/')->withErrors(['login' => 'You must be logged in to access the dashboard.']);
        }

        return $next($request);
    }
}
