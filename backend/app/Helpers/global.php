<?php

use Illuminate\Support\Facades\Auth;


function checkPermission($permission_name) {
    $auth_user =  Auth::user();

    if($auth_user->hasPermissionTo($permission_name)) {
        return true;
    }
    return false;
}
