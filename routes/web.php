<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TimelineController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return redirect('/login');
});



Route::get('give/feedback', [PagesController::class, "feedback"])->name('feedback.page');
Route::get('contact', [PagesController::class, "show_contact"])->name('contact.page');
Route::post('contact', [PagesController::class, "send_contact"])->name('contact.send');



Route::post('give/feedback', [PagesController::class, "submit_feedback"])->name('feedback.submit');

/************* uri ************************  action  ******************** name *****/

Route::middleware(['auth', 'check.admin'])->group(function () {
    Route::get('show/feedbacks', [PagesController::class, "show_feedback"])->name('feedback.show');
    Route::patch('update/{id}/feedback', [PagesController::class, "update_feedback"])->name('feedback.update');
    Route::delete('delete/{id}/feedback', [PagesController::class, "delete_feedback"])->name('feedback.delete');
});

Auth::routes([
    'verify'=>true
]);



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');





Route::get('timeline', [TimelineController::class, 'index'])->middleware(['auth', 'verified'])->name('timeline.page');
Route::post('timeline', [TimelineController::class, 'save_post'])->middleware(['auth', 'verified'])->name('timeline.new.post');

Route::get('profile', [ProfileController::class, 'index'])->middleware(['auth', 'verified'])->name('profile.page');
Route::patch('profile', [ProfileController::class, 'update_profile'])->middleware(['auth', 'verified'])->name('profile.update');

/*
 1 route = get
 2 uri = contact
 3. PagesControler show_contact
 4. contact.page
*/ 