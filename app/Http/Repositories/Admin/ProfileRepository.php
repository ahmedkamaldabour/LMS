<?php

namespace App\Http\Repositories\Admin;

use App\Http\Interfaces\Admin\ProfileInterface;
use App\Http\Traits\ImageTrait;
use App\Models\Admin;
use App\Models\Profile;
use Illuminate\Support\Facades\Hash;

class ProfileRepository implements ProfileInterface
{
    use ImageTrait;

    private $profileModel;
    public function __construct(Profile $profileModel){
        $this->profileModel = $profileModel;
    }
    public function create(){
        return view('Admin.pages.profile.create');
    }

    public function edit($profile){
        return view('Admin.pages.profile.edit',compact('profile'));
    }


    public function update($request,$profile){


        if ($request->image) {

            $profileImage = $this->uploadImage($request->image, $this->profileModel::PATH, $profile->getRawOriginal('image'));
        }

        $profile->update(
            [
                "phone" =>$request->phone,
                'image' => $profileImage ?? $profile->getRawOriginal('image'),
            ]
        );

        toast("profile Updated successfully" ,"success");
        return redirect(route('admin.index'));
    }

    public function change_password(){
        return view('Admin.pages.profile.change-password');
    }

    public function update_password($request)
    {
        if(!Hash::check($request->old_password, auth()->user()->password)){
            toast("Old Password Doesn't match!" ,"error");
            return back();
        }
        #Update the new Password
        Admin::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->password)
        ]);
        toast("Password changed successfully!" ,"success");
        return redirect(route('admin.index'));
    }

    }
