<?php

use App\Models\Balance;
use App\Models\User;

//this function for check a user status active ot not
if (!function_exists('isUserActive')) {
    function isUserActive($email): bool
    {
        $user = User::whereEmail($email)->IsActive()->exists();
        if ($user) {
            return true;
        } else {
            return false;
        }
    }
}

//this function for check a credentials verified or not
if(!function_exists('isCredentialVerified')){
    function isCredentialVerified($email,$flag ='USER') :bool{
        switch ($flag) {
            case 'USER':
                if (User::whereEmail($email)->IsVerified()->exists()) {
                    return true;
                }

            return false;
        }
    }
}

//this function return a specific user balance
if(!function_exists('getMyBalance')){
    function getMyBalance($id){
        $balance = Balance::select('amount')->where('user_id', $id)->first();
        return $balance ? $balance->amount : 0;
    }
}
