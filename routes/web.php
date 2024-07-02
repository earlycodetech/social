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


Route::post('give/feedback', [PagesController::class, "submit_feedback"])->name('feedback.submit');

/************* uri ************************  action  ******************** name *****/

Route::middleware(['auth', 'check.admin'])->group(function () {
    Route::get('show/feedbacks', [PagesController::class, "show_feedback"])->name('feedback.show');
    Route::patch('update/{id}/feedback', [PagesController::class, "update_feedback"])->name('feedback.update');
    Route::delete('delete/{id}/feedback', [PagesController::class, "delete_feedback"])->name('feedback.delete');
});

Auth::routes();



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');





Route::get('timeline', [TimelineController::class, 'index'])->middleware(['auth'])->name('timeline.page');
Route::get('profile', [ProfileController::class, 'index'])->middleware(['auth'])->name('profile.page');
