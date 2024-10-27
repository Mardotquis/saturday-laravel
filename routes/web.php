<?php

use Illuminate\Support\Facades\Route;

// long syntax returning view()
// Route::get('/', function () {
//     return view('home');
// });

// shorter syntax just mapping url to filename
// Route::view('/', 'home')->name('home');

/*
Route To Controller
Instead of Route::view(), we must change it back to Route::get(). And instead of a closure function, we will use an array parameter. The first key will be the path to the Controller, and the second will be the method in that Controller.
*/

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::view('contact', 'contact')->name('contact');
Route::view('about', 'about')->name('about');
/*
First, we should add names to the Routes. It's a good practice: when using names, if the URL is changed in the future, you won't need to change the URL on every file where it was used. Instead, after changing only in the Routes file, everywhere else, it will change automatically.


*/
// Route::get('/second', function () {
//     return view('second');
// });

Route::view('/second', 'second');