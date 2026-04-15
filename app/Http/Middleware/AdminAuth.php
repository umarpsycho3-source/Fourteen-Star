<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminAuth
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = session('user');

        if (!$user || ($user['role'] ?? null) !== 'admin') {
            return redirect()->route('login')->with('error', 'Please login as admin first.');
        }

        return $next($request);
    }
}