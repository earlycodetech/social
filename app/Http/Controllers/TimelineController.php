<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class TimelineController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(10);
        return view('home', compact('posts'));
    }

    public function  save_post(Request $request)
    {
        $request->validate([
            'caption' => "required_if:image,null|max:255",
            'image' => "required_if:caption,null|image|mimes:png,jpg,jpeg,gif|max:5120"
        ]);


        if ($request->hasFile('image')) {
            // a. Get the File
            $file = $request->file('image');

            //b. get the file extension
            $ext = $file->extension();

            //c. Generate a new name for your file
            $file_name = "post_" . time() . '_' . mt_rand() . '.' . $ext;

            // d. Move the file to a location
            $file->move('uploads/posts', $file_name);

            Post::create([
                'caption' => $request->input('caption'),
                'image' => $file_name,
                'user_id' => auth()->id()
            ]);
        }else {
            Post::create([
                'caption' => $request->input('caption'),
                'user_id' => auth()->id()
            ]);
        }

        Alert::toast('Posted', 'success');
        return back();
    }
}
