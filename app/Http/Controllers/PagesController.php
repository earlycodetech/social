<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class PagesController extends Controller
{
    public function feedback()
    {
        return view('feedback.index');
    }

    public function submit_feedback(Request $request)
    {
        // dd($request->input());
        $request->validate([
            'name' => "required|string|max:30",
            'email' => "required|string|email",
            'message' => "required|string|max:500"
        ]);

       Feedback::create([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'message' => $request->input('message'),
       ]);

        Alert::toast('We have recievd your feedback', 'success');
        return back();
    }


    public function show_feedback()
    {
        $feedbacks = Feedback::all()->sortByDesc('name');
        $feedbacks = Feedback::oldest()->get();


        $feedbacks = Feedback::latest()->paginate(1);

        return view('feedback.show', compact('feedbacks'));
    }
}
