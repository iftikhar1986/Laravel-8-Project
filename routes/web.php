<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
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
    return view('welcome');
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


////////////////////////Multi Image Route////////////////////////////////
Route::get('/multi/image', [BrandController::class, 'multiPic'])->name('multi.image');

Route::post('/multi/add', [BrandController::class, 'StoreImg'])->name('store.image');
Route::get('/multi/add', [BrandController::class, 'StoreImg'])->name('store.image');



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {


    //Using Eloquent ORM Read Users Data
  // $users = User::all();


   //Query Builder Read Users Data
 //  $users = DB::table('users')->get();

    return view('admin.index',);
})->name('dashboard');
