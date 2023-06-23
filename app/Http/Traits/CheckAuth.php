<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Auth;

trait CheckAuth
{

    public function checkAuth($credentials)
    {
        if (Auth::attempt($credentials)) {
            $user = Auth::getProvider()->retrieveByCredentials($credentials);

            Auth::login($user);

            return true;
        }

        return false;
    }
}
