<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param \Illuminate\Http\Request $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            $prefix = $request->route()->action['prefix'];
            if ($prefix == '/admin') {
                return route('admin.login');
            } else {
                return route('customer.login');
            }
        }
    }
}
