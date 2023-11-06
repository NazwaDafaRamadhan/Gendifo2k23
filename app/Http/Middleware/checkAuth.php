<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class checkAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->status === 'Non-Active') {
                return redirect()->route('not-confirmed');
            }
        } else {
            return redirect()->back()->with('toast_error', 'Anda tidak dapat mengakses halaman ini.');
        }

        return $next($request);
    }
}
