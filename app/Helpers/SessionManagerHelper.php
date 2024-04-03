<?php

use Illuminate\Support\Facades\Auth;

if (!function_exists('getImpersonatedUser')) {
    function getImpersonatedUser()
    {
        if(Auth::user()->isImpersonated()){
            return Auth::user()->getImpersonator();
        }
    }
}
