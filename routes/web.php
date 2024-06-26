<?php

use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return redirect('/login');
});



Route::get('give/feedback', [PagesController::class, "feedback"])->name('feedback.page');

Route::get('show/feedbacks', [PagesController::class, "show_feedback"])->name('feedback.show');

Route::post('give/feedback', [PagesController::class, "submit_feedback"])->name('feedback.submit');

Route::patch('update/{id}/feedback', [PagesController::class, "update_feedback"])->name('feedback.update');

Route::delete('delete/{id}/feedback', [PagesController::class, "delete_feedback"])->name('feedback.delete');
/************* uri ************************  action  ******************** name *****/ 

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
