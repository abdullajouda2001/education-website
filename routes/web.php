<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Admin\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
 


Route::prefix('admin')->name('admin.')->middleware('auth','admin')->group(function(){
   Route::get('/',[AdminController::class,'index'])->name('index');
   Route::get('category/trash',[CategoryController::class,'trash'])->name('category.trash');
   
   Route::get('category/restore/{id}',[CategoryController::class,'restore'])->name('category.restore');

Route::delete('category/forcedelete/{id}',[CategoryController::class,'forcedelete'])->name('category.forcedelete');

   Route::resource('/category',CategoryController::class);
   

//    Route::get('/',[AdminController::class,'index'])->name('index');
   Route::get('course/trash',[CourseController::class,'trash'])->name('course.trash');
   
   Route::get('course/restore/{id}',[CourseController::class,'restore'])->name('course.restore');

    Route::delete('course/forcedelete/{id}',[CourseController::class,'forcedelete'])->name('course.forcedelete');

   Route::resource('/course',CourseController::class);



   
//    Route::get('/',[AdminController::class,'index'])->name('index');
Route::get('Vedio/trash',[VideoController::class,'trash'])->name('Vedio.trash');
   
Route::get('Vedio/restore/{id}',[VideoController::class,'restore'])->name('Vedio.restore');

 Route::delete('Vedio/forcedelete/{id}',[VideoController::class,'forcedelete'])->name('Vedio.forcedelete');

Route::resource('/Vedio',VideoController::class);

});
Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{

    // route need to loca.. 
    Route::get('/',[WebsiteController::class,'index'])->name('index');
    Route::prefix('web')->name('website')->group(function(){
        Route::get('/about',[WebsiteController::class,'about'])->name('about');
        Route::get('/Category',[WebsiteController::class,'Category'])->name('Category');
        Route::get('/Login',[WebsiteController::class,'Login'])->name('Login');
        Route::get('/Contact',[WebsiteController::class,'Contact'])->name('Contact');
        Route::get('/Courses',[WebsiteController::class,'Courses'])->name('Courses');

    });
	

});

