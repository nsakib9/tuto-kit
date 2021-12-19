<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileConroller;
use App\Http\Controllers\GroupChantController;
use App\Http\Controllers\MassengerGroupsController;
use App\Models\Course;
use App\Models\Review;
use App\Models\Option;

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
$routes = Option::where('type','page')->get();
foreach ($routes as $r){
    Route::get($r->url,function(){
       return view('frontend.custom_page.index');
    });
}
Route::get('/',function(){
    $class = Course::where('status',1)->get();
    $review = Review::where('status',1)->get();
    return view('frontend.home',compact('class','review'));
});
Route::view('/career','frontend.carear')->middleware('guest');
Route::view('/contact','frontend.contact');
Route::post('/contact',[ContactController::class,'store']);


Route::middleware('auth')->group(function(){
     Route::get('/profile',[ProfileConroller::class,'index']);
     Route::post('/profile_image_update',[ProfileConroller::class,'profile_image_update'])->name('profile.image');
     Route::post('/profile_info_update',[ProfileConroller::class,'profile_info_update'])->name('profile.info');

     // massenger_groups
     Route::get('/massenger_groups',[MassengerGroupsController::class,'index']);//main Interface
     Route::get('/groupmakermodal',[MassengerGroupsController::class,'modal']);//Group Interface Modal
     Route::get('/groupmanegemodal',[MassengerGroupsController::class,'modal']);//Member Interface Modal
     Route::post('/groupmakerstore',[MassengerGroupsController::class,'store']);//Group Store To Modal
     Route::post('/groupmakerrestore',[MassengerGroupsController::class,'update']);//Group Re Store To Modal
     Route::post('/groupmakerdelete/{id}',[MassengerGroupsController::class,'delete']);//Group Delete From Modal

     Route::get('/getuserformembers-check/{group}/{id}',[MassengerGroupsController::class,'memberCheck']);//Member Find
     Route::post('/getuserformembers',[MassengerGroupsController::class,'getMembers']);//Member Find
     Route::post('/membersmanege/{group}/{id}',[MassengerGroupsController::class,'member']);//Member Add/remove


    //  As API for Group Messege
     Route::post('/gropchatroom',[GroupChantController::class,'store_group']);
});







