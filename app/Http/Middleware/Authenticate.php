<?php

namespace App\Http\Middleware;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ObatController;
use App\Views\Auth;
use APp\Views\Passwords;
use App\Models\Obat;
use App\Models\User;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null : route('obat.store');
    }
}
