<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


function checkPermission($permission_name)
{
    $auth_user =  Auth::user();

    if (!$auth_user) {
        return false;
    }

    if ($auth_user->hasPermissionTo($permission_name)) {
        return true;
    }
    return false;
}


function deleteImageWithPath($path_delete)
{

    if (File::exists($path_delete)) {
        File::delete($path_delete);
    }
}

function getVehicleCategories()
{
    return [
        1 => 'Cars/SUVs',
        2 => 'Buses',
        3 => 'Trucks'
    ];
}
