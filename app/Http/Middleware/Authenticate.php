<?php

namespace App\Http\Middleware;

use Alert;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    protected function redirectTo($request){
        if (! $request->expectsJson()) {
            Alert::warning('Error', 'Sólo los usuarios registrados tienen permitido acceder a esta función');
            return route('inicio');
        }
    }
}
