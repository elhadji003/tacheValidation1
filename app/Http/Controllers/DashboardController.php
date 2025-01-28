<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            return $next($request)
                ->header('Cache-Control', 'no-cache, no-store, must-revalidate') // Désactive le cache
                ->header('Pragma', 'no-cache') // Pour la compatibilité avec HTTP/1.0
                ->header('Expires', '0'); // Expire immédiatement
        });
    }
}
