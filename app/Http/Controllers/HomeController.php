<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    public function index()
    {
        // $allCategories = ['Category 1', 'Category 2'];
        // $allCategories = DB::table('categories')->get();

        // same as above^; comes out the box with all() available
        $allCategories = Category::all();

        // $posts = Post::orderBy('id', 'desc')->get();
        // Alternative syntax for the orderBy(): we can use an Eloquent method called latest().
        // $posts = Post::latest()->get();

        // to show posts when this parameter is in the URL
        // $posts = Post::where('category_id', request('category_id'))->latest()->get();

        // use this to conditionally render one post when that parameter is in the URL, and all by default
        $posts = Post::when(request('category_id'), function ($query) {
            $query->where('category_id', request('category_id'));
        })->latest()->get();


        \Log::info('$allCategories:' . $allCategories);
        \Log::info('$posts:' . $posts);


        // echo '$allCategories:' . $allCategories;
        /*
        what happens if I echo something? is that now allowed
In Laravel, echoing output directly from a controller is allowed, but it is generally not recommended. The reason for this is that Laravel follows the MVC (Model-View-Controller) architectural pattern, where controllers handle the application logic, models interact with the database, and views are responsible for presenting the data to the user.

When you echo output directly from a controller, you are mixing the application logic with the presentation layer, which goes against the separation of concerns principle advocated by the MVC pattern. Additionally, echoing directly from a controller can make it harder to maintain and test your code in the long run.

A better approach in Laravel is to pass data from the controller to a view and let the view handle the presentation of the data. This ensures a clean separation of concerns and makes your code more maintainable and testable.
        */

        // return view('home');
        /*
            The view() helper accepts a second parameter as an array. In this case, in the home View file, data will be accessible as a $categories variable.
        */
        // return view('home', [
        //     'categories' => $allCategories,
        //     'posts' => $posts
        // ]);


        /*
        There is a shorter way using the PHP function compact(), just listing the variables one by one. This function can be used if the names of the variables are the same as array keys, so we need to rename the $allCategories variable to $categories.
         */

        $categories = $allCategories;
        \Log::info('$categories->items()' . $categories);
        return view('home', compact('categories', 'posts'));
    }
}

/*
First, we need to get these categories from the DB. This is where the Controllers are introduced. Until now, we've used Routes with Route::view() for static pages.

If you want dynamic data, you need to introduce a Controller, which would get that dynamic data and pass it to the View.

You will use many artisan commands to make or run something. The Controller also can be created using an artisan command:

php artisan make:controller HomeController
*/