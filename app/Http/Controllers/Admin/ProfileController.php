<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Admin\ProfileInterface;
use App\Http\Requests\Admin\Profile\ProfileStoreRequest;
use App\Http\Requests\Admin\Profile\ProfileUpdateRequest;
use App\Http\Requests\Admin\Profile\UpdatePasswordRequest;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    private $profileInterface;

    public function __construct(ProfileInterface $profile)
    {
        $this->profileInterface = $profile;
    }
    public function create(){
        return $this->profileInterface->create();
    }

    public function edit(Profile $profile){
        return $this->profileInterface->edit($profile);
    }

    public function update(ProfileUpdateRequest $request , Profile $profile){
        return $this->profileInterface->update($request,$profile);
    }

    public function change_password(){
        return $this->profileInterface->change_password();
    }

    public function update_password(UpdatePasswordRequest $request){
        return $this->profileInterface->update_password($request);
    }

}
