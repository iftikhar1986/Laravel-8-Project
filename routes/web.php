<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\WebController;
use App\Models\Multipic;
use App\Http\Controllers\ChangePass;


use App\Models\User;  //Using Eloquent ORM Read Users Data
use Illuminate\Support\Facades\DB;  //Query Builder Read Users Data

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/', function () {
    $brands =  DB::table('brands')->get();
    $abouts =  DB::table('home_abouts')->first();
    $services =  DB::table('services')->get();
    $images =  Multipic::all();

    return view('home',compact('brands','abouts','services','images'));
});

Route::get('/home', function () {
    echo "This is Home Page";
});

Route::get('/about', function () {
    return view('about');
});    //})->middleware('check');

//Route::get('/contact','ContactController@index' );  Using in 6 and 7 Laravel


//Using in Laraval 8
Route::get('/contact', [ContactController::class, 'index'])->name('abc');

//Category Controller
Route::get('/category/all', [CategoryController::class, 'AllCat'])->name('all.category');

Route::post('/category/add', [CategoryController::class, 'AddCat'])->name('store.category');

//Edit Catagory Contoller
Route::get('category/edit/{id}', [CategoryController::class, 'Edit']);

//Update Catagory Contoller
Route::post('category/update/{id}', [CategoryController::class, 'Update']);

//SoftDelete Catagory Contoller
Route::get('softdelete/category/{id}', [CategoryController::class, 'SoftDelete']);

//Edit Catagory Contoller
Route::get('category/restore/{id}', [CategoryController::class, 'Restore']);


//P Delete Catagory Contoller
Route::get('pdelete/category/{id}', [CategoryController::class, 'Pdelete']);





/////////////////////////Brand Route///////////////////////////////////
Route::get('/brand/all', [BrandController::class, 'AllBrand'])->name('all.brand');

Route::post('/brand/add', [BrandController::class, 'StoreBrand'])->name('store.brand');


Route::get('brand/edit/{id}', [BrandController::class, 'Edit']);

Route::post('brand/update/{id}', [BrandController::class, 'Update']);

Route::get('brand/delete/{id}', [BrandController::class, 'Delete']);


/* Multi Image Route */

Route::get('/multi/image', [BrandController::class, 'multiPic'])->name('multi.image');

Route::post('/multi/add', [BrandController::class, 'StoreImg'])->name('store.image');

Route::get('/multi/add', [BrandController::class, 'StoreImg'])->name('store.image');




/* Admin  ALL Route */

Route::get('/home/slider', [HomeController::class, 'homeSlider'])->name('home.slider');
Route::get('/add/slider', [HomeController::class, 'addSlider'])->name('add.slider');
Route::post('/store/slider', [HomeController::class, 'storeSlider'])->name('store.slider');
Route::get('slider/edit/{id}', [HomeController::class, 'edit']);
Route::post('slider/edit/{slider}', [HomeController::class, 'update']);
Route::get('slider/delete/{slider}', [HomeController::class, 'delete']);

/* Home About Route */

Route::get('/home/about', [AboutController::class, 'homeAbout'])->name('home.about');
Route::get('/add/about', [AboutController::class, 'addAbout'])->name('add.about');
Route::post('/store/about', [AboutController::class, 'storeAbout'])->name('store.about');
Route::get('about/edit/{homeAbout}', [AboutController::class,'edit'])->name('edit.about');
Route::post('about/edit/{homeAbout}', [AboutController::class,'update']);
Route::get('about/delete/{homeAbout}', [AboutController::class, 'delete']);

/* Services */
Route::get('/home/service', [ServiceController::class,'index'])->name('home.service');
Route::get('/add/service', [ServiceController::class, 'create'])->name('add.service');
Route::post('/store/service', [ServiceController::class, 'store'])->name('store.service');
Route::get('service/edit/{service}', [ServiceController::class,'edit'])->name('edit.service');
Route::post('service/edit/{service}', [ServiceController::class,'update']);
Route::get('service/delete/{service}', [ServiceController::class, 'destroy']);

/* Admin Contact Page*/
Route::get('/admin/contact', [ContactController::class,'index'])->name('admin.contact');
Route::get('/add/contact', [ContactController::class, 'create'])->name('add.contact');
Route::post('/store/contact', [ContactController::class, 'store'])->name('store.contact');
Route::get('contact/edit/{contact}', [ContactController::class,'edit'])->name('edit.contact');
Route::patch('contact/edit/{contact}', [ContactController::class,'update']);
Route::get('contact/delete/{contact}', [ContactController::class, 'destroy'])->name('delete.contact');
Route::get('/contact/massage', [ContactController::class,'contactMassage'])->name('contact.massage');

/* front End Contact page */
Route::get('/contact', [WebController::class,'contact'])->name('contact');
Route::post('/contact/form', [WebController::class,'contactForm'])->name('contact.form');
Route::get('massage/delete/{contactForm}', [WebController::class, 'destroy'])->name('delete.massage');




Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {


    //Using Eloquent ORM Read Users Data
  // $users = User::all();


   //Query Builder Read Users Data
 //  $users = DB::table('users')->get();

    return view('admin.index',);
})->name('dashboard');

Route::get('/user/logout',[BrandController::class,'logOut'])->name('user.logout');



/* Change Password and User Profile */

Route::get('/user/password',[ChangePass::class,'changePassword'])->name('change.password');
Route::post('/password/update',[ChangePass::class,'updatePassword'])->name('password.update');

Route::get('/user/profile',[ChangePass::class,'profileUpdate'])->name('profile.update');
Route::post('/user/profile/update',[ChangePass::class,'updateUser'])->name('update.user.profile');



