<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return view('profile', compact('user'));
    }

    public function update_profile(Request $request)
    {
        $request->validate([
            'name' => "required|string|max:100",
            'username' => "required|string|unique:users,username," . auth()->id(),
            'avatar' => "nullable|image|mimes:png,jpg,jpeg|max:2048"
        ]);

        //Get the old avatar name;
        $old_avatar = auth()->user()->avatar;
        if ($old_avatar == 'user.png') {
           $old_avatar = null;
        }

        // 1. Check if user uploaded file
        if ($request->hasFile('avatar')) {
            // a. Get the File
            $file = $request->file('avatar');

            //b. get the file extension
            $ext = $file->extension();

            //c. Generate a new name for your file
            $file_name = "avatar_" . time() . '_' . mt_rand() . '.' . $ext;

            // d. Move the file to a location
            $file->move('avatars', $file_name);

            // e. Update your database with the name of the file
            User::where('id', auth()->id())->update([
                'name' => $request->input('name'),
                'username' => $request->input('username'),
                'avatar' => $file_name
            ]);

            //f . Delete the old Image
            $old_avatar = public_path('avatars/' .$old_avatar);
            if (File::exists($old_avatar)) {
               File::delete($old_avatar);
            }
        } else {
            // 2. When no avatar is uploaded
            User::where('id', auth()->id())->update([
                'name' => $request->input('name'),
                'username' => $request->input('username'),
            ]);
        }


        Alert::toast("Profile Updated", 'success');
        return back();
    }
}
