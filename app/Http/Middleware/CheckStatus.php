<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckStatus
{
    public function handle(Request $request, Closure $next, $status)
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        $user = Auth::user();

        if ($user->status !== $status) {
            return redirect('home');
        }

        return $next($request);
    }
}
