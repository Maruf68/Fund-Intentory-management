<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProjectController;

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

Route::get('/', function () {
    return view('welcome');
});





//user

Route::get('/redirects',[HomeController::class,'index']);
Route::post('/adduser',[HomeController::class,'adduser']);

Route::get('/admin',[HomeController::class,'admin']);
Route::get('/user',[HomeController::class,'user']);

Route::get('/addfund',[HomeController::class,'addfund']);

Route::post('/addfund',[HomeController::class,'submitfund']);

Route::get('/fundlist',[HomeController::class,'fundlist']);



Route::get('/userlist',[HomeController::class,'showuser'])->name('userlist');

Route::get('/delete/{id}',[HomeController::class,'deleteData']);


Route::get('/deletefund/{id}',[HomeController::class,'deletefund']);




//category

Route::get('/pagination/paginate-data',[HomeController::class,'pagination']);

Route::get('/categorylist',[HomeController::class,'categorylist']);


Route::get('/searchProduct',[HomeController::class,'searchProduct']);


Route::get('/category',[HomeController::class,'category']);

Route::post('/submitcategory',[HomeController::class,'SubmitCategory']);


Route::get('/editcategory/{id}',[HomeController::class,'editcategory']);

Route::post('/updatecategory/{id}',[HomeController::class,'updatecategory']);



//costcategory

Route::get('/costcategory',[ProjectController::class,'costcategory']);

Route::post('/costcategory',[ProjectController::class,'submitcostcategory']);

Route::get('/costcategorylist',[ProjectController::class,'costcategorylist']);


Route::get('/deletecostcategory/{id}',[ProjectController::class,'deletecostcategory']);

Route::get('/editcostcategory/{id}',[ProjectController::class,'editcostcategory']);

Route::post('/updatecostcategory/{id}',[ProjectController::class,'updatecostcategory']);


//project

Route::get('/addproject',[ProjectController::class,'addproject']);

Route::post('/postproject',[ProjectController::class,'postproject']);


Route::get('/projectlist',[ProjectController::class,'projectlist']);

Route::get('/deleteproject/{id}',[ProjectController::class,'deleteproject']);


Route::get('/editproject/{id}',[ProjectController::class,'editproject']);

Route::post('/updateproject/{id}',[ProjectController::class,'updateproject']);




//costlist

Route::get('/addcostlist',[ProjectController::class,'addcostlist']);

Route::post('/postcostlist',[ProjectController::class,'postcostlist']);


Route::get('/costlist',[ProjectController::class,'costlist']);



Route::get('/deletecostlist/{id}',[ProjectController::class,'deletecostlist']);

Route::get('/editcostlist/{id}',[ProjectController::class,'editcostlist']);

Route::post('/updatecostlist/{id}',[ProjectController::class,'updatecostlist']);





//user edit

Route::get('/edit/{id}',[HomeController::class,'editData']);


Route::post('/update/{id}',[HomeController::class,'updateData']);


//fund

Route::get('/editfund/{id}',[HomeController::class,'editfund']);

Route::post('/updatefund/{id}',[HomeController::class,'updatefund']);


//Balance sheet

Route::get('/balance',[ProjectController::class,'balance']);



//auth


Route::group(['middleware' => ['auth']], function() {
    /**
    * Logout Route
    */
    Route::get('/logout', [LogoutController::class,'perform'])->name('logout.perform');
 });









 Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
   
        return view('dashboard');
    })->name('dashboard');
});







// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
  
//     Route::get('/dashboard/{id}', function ($id=null) {  
//         $printname = User::find($id); 
//         return view('dashboard')->with('printname',$printname);
//     })->name('dashboard');
// });





