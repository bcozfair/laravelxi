<?php

use App\Http\Controllers\CategoryController;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Expr\FuncCall;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LicenseController;  
use App\Http\Controllers\UserController; 
use App\Http\Controllers\VehicleController; 



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
})->middleware('auth', 'role:admin,teacher');

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
})->name('index');

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

// Week4
// Section 1: Control structure on Blade
Route::get('test', function () {
    return view('test');
})->name('test');

// Section 2 : Example of Control Structure Usage (Coronavirus Report)
Route::get('/coronavirus', function () {
    $reports = [
        (object) ["country" => "China", "date" => "2020-04-19", "total" => "2765", "active" => "790", "death" => "47", "recovered" => "1928"],
        (object) ["country" => "China", "date" => "2020-04-18", "total" => "2733", "active" => "899", "death" => "47", "recovered" => "1787"],
        (object) ["country" => "Thailand", "date" => "2020-04-17", "total" => "2700", "active" => "964", "death" => "47", "recovered" => "1689"],
        (object) ["country" => "Thailand", "date" => "2020-04-16", "total" => "2672", "active" => "1033", "death" => "46", "recovered" => "1593"],
        (object) ["country" => "Thailand", "date" => "2020-04-15", "total" => "2643", "active" => "1103", "death" => "43", "recovered" => "1497"],
    ];
    return view("coronavirus", compact("reports"));
})->name('coronavirus');

// Section 3: RESTful API
Route::get('/active/teacher', function () {
    $teachers = json_decode(file_get_contents('https://raw.githubusercontent.com/arc6828/laravel8/main/public/json/teachers.json'));
    return view("active.teacher", compact("teachers"));
})->name('active.teacher');

// Section 5 : Example usages of Controller

// ก่อนมี Controller

// Route::get('/category/sport', function () {
//     return "<h1>This is sport Category Page</h1>";
// });
// Route::get('/category/politic', function () {
//     return "<h1>This is politic Category Page</h1>";
// });
// Route::get('/category/entertain', function () {
//     return "<h1>This is entertain Category Page</h1>";
// });
// Route::get('/category/auto', function () {
//     return "<h1>This is auto Category Page</h1>";
// });

// หลังมี Controller
Route::get('/category/sport', [CategoryController::class, "sport"]);
Route::get('/category/politic', [CategoryController::class, "politic"]);
Route::get('/category/entertain', [CategoryController::class, "entertain"]);
Route::get('/category/auto', [CategoryController::class, "auto"]);

Route::get('product-index', function () {
    $products = Product::get();
    return view('query-test', compact('products'));
})->name("product.index");


Route::get('product-form', function () {    
    return view('product-form');
})->name("product.form");

Route::post('/product-submit', function (Request $request) {    
    $data = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric|min:0',
        'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ], [
        'name.required' => 'กรุณากรอกชื่อสินค้า',
        'description.required' => 'กรุณากรอกรายละเอียดสินค้า',
        'price.required' => 'กรุณากรอกราคา',
        'price.numeric' => 'ราคาต้องเป็นตัวเลข',
        'image.image' => 'ไฟล์ต้องเป็นรูปภาพ',
    ]
    );    

    // ตรวจสอบว่ามีการอัปโหลดรูปภาพ
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('uploads', 'public');
        $url = Storage::url($imagePath);
        $data["image"] =$url;
    }

    // บันทึกข้อมูลในฐานข้อมูล
    Product::create($data);

    return redirect()->route('product.index')->with('success', 'เพิ่มสินค้าแล้ว!');
})->name('product.submit');


// claim Form
use App\Http\Controllers\ClaimController;

// Route to display the claim form
Route::get('/claim-form', [ClaimController::class, 'showForm'])->name('claims.form');

// Route to handle claim form submission
Route::post('/claims/submit', [ClaimController::class, 'submit'])->name('claims.submit');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::resource('license', LicenseController::class);
Route::resource('user', UserController::class);
Route::resource('vehicle', VehicleController::class);
