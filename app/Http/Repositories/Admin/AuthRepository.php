<?php

namespace App\Http\Repositories\Admin;

use App\Http\Interfaces\Admin\AuthInterface;
use App\Http\Traits\CheckAuth;
use Illuminate\Support\Facades\Auth;


class AuthRepository implements AuthInterface
{
    use CheckAuth;

    public function index()
    {
        return \view('Admin.pages.auth.login');
    }

    public function login($request)
    {
        $credentials = $request->only('email', 'password');

        if ($this->checkAuth($credentials)) {
            toast("welcome again", "success");
            return redirect()->route('admin.index');
        }
        toast("credentials are invalid", "error");
        return redirect()->route('admin.auth.index');
    }

    public function logout()
    {
        \session()->flush();
        Auth::logout();
        return redirect(route('admin.auth.index'));
    }
}
