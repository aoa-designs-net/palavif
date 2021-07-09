<?php

/*
Custom Helpers For Portal
Author: AOA DESIGNS
*/

if (!function_exists('format_money')) {
    function format_money($amount)
    {
        return number_format($amount, 2, '.', ',');
    }
}

if (!function_exists('set_active_route')) {
    function set_active_route($route)
    {
        return \Illuminate\Support\Facades\Route::currentRouteNamed($route) ? 'active' : '';
    }
}

if (!function_exists('set_user_initials')) {
    function set_user_initials($name)
    {
        return \Illuminate\Support\Str::limit($name, 1, '');
    }
}
