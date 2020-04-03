<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use App\User;

class ProfilesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = auth()->user();

        return view('admin.profiles.index', compact('user'));
    }

    public function edit()
    {
        $user = auth()->user();

        return view('admin.profiles.edit', compact('user'));
    }

    public function update(UpdateProfileRequest $request, User $user)
    {
        $user = auth()->user();

        if (!empty($request->avatar)) {
            $avatarName = $user->id.'_avatar'.time().'.'.request()->avatar->getClientOriginalExtension();
            if ($user->avatar != $avatarName && $user->avatar != 'user.png') {
                Storage::delete('public/avatars/'.$user->avatar);
            }
            $request->avatar->storeAs('avatars',$avatarName, 'public');
            $user->update(['avatar' => $avatarName]);
            Image::make('storage/avatars/'.$user->avatar)->resize(150, 150)->save();
        }

        $data = $request->all();
        $data['avatar'] = $user->avatar;
        $user->update($data);

        return redirect()->route('admin.profiles.index');
    }
}
