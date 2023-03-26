<?php


if (!function_exists('authenticated_user')) {
    /**
     * returns the object of authenticated user
     * @param $guard
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    function authenticated_user($guard = 'sanctum')
    {
        return \Illuminate\Support\Facades\Auth::guard($guard)->user();
    }
}
if (!function_exists('authenticated_id')) {
    /**
     * returns the id of the authenticated user
     * @return int|string|null
     */
    function authenticated_id($guard = 'sanctum')
    {
        return authenticated_user($guard)?->id;
    }
}
