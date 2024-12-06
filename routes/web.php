<?php

use Illuminate\Support\Facades\Route;
use PhpParser\Node\Expr\FuncCall;

Route::get('/', function () {
    return view('welcome');
});

// Ex.1
Route::get("/homepage", function () {
    return "<h1>This is home page</h1>";
});

// Ex.2
Route::get("/blog/{id}", function ($id) {
    return "<h1>This is blog page : {$id} </h1>";
});

// Ex.3
Route::get("/blog/{id}/edit", function ($id) {
    return "<h1>This is blog page : {$id} for edit</h1>";
});

// Ex.4
Route::get("/product/{a}/{b}/{c}", function ($a, $b, $c) {
    return "<h1>This is product page</h1><div>{$a},{$b},{$c}</div>";
});

// Ex.5
Route::get("/category/{a?}", function ($a = "mobile") {
    return "<h1>This is category page : {$a}</h1>";
});

// Ex.6
Route::get("/myorder/create", function () {
    return "<h1>This is order form page : " . request("username") . "</h1>";
});

// hello.blade
Route::get("/hello", function () {
    return view("hello");
});

// greeting.blade
Route::get('/greeting', function () {
    $name = 'James';
    $last_name = 'Mars';

    return view('greeting', compact('name', 'last_name'));
});

// bootstrap-example
Route::get('/bootstrap-example', function () {
    return view('bootstrap-example');
});

// week2 quiz1
Route::get("/gallery", function () {
    $ant = "https://cdn3.movieweb.com/i/article/Oi0Q2edcVVhs4p1UivwyyseezFkHsq/1107:50/Ant-Man-3-Talks-Michael-Douglas-Update.jpg";
    $bird = "https://images.indianexpress.com/2021/03/falcon-anthony-mackie-1200.jpg";
    $cat = "http://www.onyxtruth.com/wp-content/uploads/2017/06/black-panther-movie-onyx-truth.jpg";
    $god = "https://www.blackoutx.com/wp-content/uploads/2021/04/Thor.jpg";
    $spider = "https://t4.ftcdn.net/jpg/03/90/33/43/360_F_390334321_IlWexCFcXEJOuC1nWpBrPYRjFw8kXefg.jpg";

    return view("test/index", compact("ant", "bird", "cat", "god", "spider"));
});

// week2 quiz2
Route::get("/gallery/ant", function () {
    $ant = "https://cdn3.movieweb.com/i/article/Oi0Q2edcVVhs4p1UivwyyseezFkHsq/1107:50/Ant-Man-3-Talks-Michael-Douglas-Update.jpg";
    return view("test/ant", compact("ant"));
});

Route::get("/gallery/bird", function () {
    $bird = "https://images.indianexpress.com/2021/03/falcon-anthony-mackie-1200.jpg";
    return view("test/bird", compact("bird"));
});

Route::get("/gallery/cat", function () {
    $cat = "http://www.onyxtruth.com/wp-content/uploads/2017/06/black-panther-movie-onyx-truth.jpg";
    return view("test/cat", compact("cat"));
});

// Week3
Route::get("/teacher", function () {
    return view("teacher");
});

Route::get("/student", function () {
    return view("student");
});

Route::get("/theme", function () {
    return view("theme");
});

// Inheritance
Route::get("/teacher/inheritance", function () {
    return view("teacher-inheritance");
});

Route::get("/student/inheritance", function () {
    return view("student-inheritance");
});

// Component
Route::get("/teacher", function () {
    return view("teacher");
});

Route::get("/student", function () {
    return view("student");
});

// Week3 Quiz1
Route::get('/active/index', function () {
    return view('active/index');
})->name ('index');

// Week3 Quiz2
Route::get('/active/about', function () {
    return view('active/about');
})->name('about');
Route::get('/active/services', function () {
    return view('active/services');
})->name('services');
Route::get('/active/portfolio', function () {
    return view('active/portfolio');
})->name('portfolio');
Route::get('/active/portfolio-details', function () {
    return view('active/portfolio-details');
})->name('portfolio-details');
Route::get('/active/team', function () {
    return view('active/team');
})->name('team');
Route::get('/active/blog', function () {
    return view('active/blog');
})->name('blog');
Route::get('/active/blog-details', function () {
    return view('active/blog-details');
})->name('blog-details');
Route::get('/active/contact', function () {
    return view('active/contact');
})->name('contact');

// {{ asset('asset jpg')}}