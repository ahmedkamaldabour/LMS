<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Admin\HomeInterface;
use App\Models\Profile;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $homeInterface;
    private $profile;
    public function __construct(HomeInterface $home,Profile $profile)
    {
        $this->homeInterface = $home;
        $this->profile = $profile;

    }

    public function index()
    {
        return $this->homeInterface->index();
    }
}
