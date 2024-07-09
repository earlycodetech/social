<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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


        $feedbacks = Feedback::latest()->paginate(10);

        return view('feedback.show', compact('feedbacks'));
    }


    public function update_feedback($id)
    {
        //    $feedback =  Feedback::where('id', '=', $id)->get();
        // $feedback =  Feedback::where('id', '=', $id)->first();
        $feedback =  Feedback::findOrFail($id)->update([
            'status' => "read"
        ]);


        Alert::toast("Update Successful", 'success');
        return back();
    }
    
    public function delete_feedback($id)
    {
       
        Feedback::findOrFail($id)->delete();

        Alert::toast("Deleted Successfully", 'success');
        return back();
    }


    public function show_contact()
    {
        return view('contact');
    }       

    public function  send_contact(Request $request)  
    {
        $data =  $request->validate([
            'name' => "required|string|max:100",
            'email' => "required|string|email",
            'message' => "required|string"
        ]);

        Mail::to('admin@social.com')->send(new ContactMail($data));
        Alert::toast("Message Sent Successfully", 'success');
        return back();
    }

}
