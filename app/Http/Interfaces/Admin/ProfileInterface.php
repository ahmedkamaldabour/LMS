<?php

namespace App\Http\Interfaces\Admin;

use App\Models\Profile;

interface ProfileInterface
{
    public function create();

    public function change_password();

    public function update_password($request);

    public function edit($profile);

    public function update($request , $profile);


}
