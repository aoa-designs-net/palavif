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
