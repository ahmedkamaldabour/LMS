<?php

namespace App\Http\Repositories\Admin;

use App\Http\Interfaces\Admin\HomeInterface;
use App\Models\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class HomeRepository implements HomeInterface
{

    public function index(): Factory|View|Application
    {
        return view('Admin.index');
    }
}
