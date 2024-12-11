<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoggedIn
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (Auth::check()) {
            $user = Auth::user();
            if ($user->status_user_id_status == 1) {
                return redirect("mahasiswa")->withErrors("Anda Sudah Login");
            } else if ($user->status_user_id_status == 2) {

                return redirect("kantin")->withErrors("Anda Sudah Login");
            } else if ($user->status_user_id_status == 3) {
                return redirect("admin/home")->withErrors("Anda Sudah Login");
            }
        }

        return $next($request);
    }
}
