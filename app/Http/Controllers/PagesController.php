<?php

namespace App\Http\Controllers;

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



        Alert::toast('We have recievd your feedback', 'success');
        return back();
    }
}
