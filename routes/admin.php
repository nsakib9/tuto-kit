<?php

use App\Http\Controllers\admin\SettingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\CategryController;
use App\Http\Controllers\admin\ClassController;
use App\Http\Controllers\admin\SubjectController;
use App\Http\Controllers\admin\RolePermissionController;
use App\Http\Controllers\admin\UserManegeController;
use App\Http\Controllers\ContactController;

// START // Route Prefixes 'admin' and 'middlewere' => 'auth' 
Route::prefix('admin')->middleware('auth')->group(function () {
    //Dashboard
    Route::view('/','backend.home')->name('admin');

    //Setting Manege
    Route::get('/settings',[SettingController::class,'index']);
    Route::get('/settings_modal',[SettingController::class,'modal']);
    Route::post('/settings',[SettingController::class,'store']);
    Route::post('/settings_update',[SettingController::class,'update']);
    Route::post('/settings_delete/{id}',[SettingController::class,'delete']);
    // as api for Main Menu setting
    Route::get('/sub_menu/{id}',[SettingController::class,'get_sub_menu']);
    Route::post('/upload_image_to_temp',[SettingController::class,'temp_save']);
    Route::post('/delete_temp_file',[SettingController::class,'temp_delete']);
    Route::post('/upload_post_to_server',[SettingController::class,'store_page']);
    Route::post('/update_post_to_server',[SettingController::class,'update_page']);

    //MassageBox
    //Route::get('/mailbox',[ContactController::class,'index']);

    //Contact Page
    Route::get('/contact',[ContactController::class,'index']);
    Route::get('/read_contact/{id}',[ContactController::class,'json_page']);
    Route::post('/delete_contact/{id}',[ContactController::class,'delete']);

    // Category 
    Route::get('/category',[CategryController::class,'index'])->name('category');//get view
    Route::get('/create_category',[CategryController::class,'show']);//get create record modal
    Route::get('/edit_category/{id}',[CategryController::class,'edit']);//get edit record modal
    Route::post('/create_category',[CategryController::class,'store']);// create record 
    Route::post('/edit_category',[CategryController::class,'update']);// edit record 
    Route::post('/delete_category/{id}',[CategryController::class,'delete']);// delete record 

    // Class Or Course 
    Route::get('/class',[ClassController::class,'index'])->name('class');//get view
    Route::get('/create_class',[ClassController::class,'show']);//get create record modal
    Route::get('/edit_class/{id}',[ClassController::class,'edit']);//get edit record modal
    Route::post('/create_class',[ClassController::class,'store']);// create record 
    Route::post('/edit_class',[ClassController::class,'update']);// edit record 
    Route::post('/delete_class/{id}',[ClassController::class,'delete']);// delete record

    // Class Subjects 
    Route::get('/create_subject/{sub}',[SubjectController::class,'show']);//get edit record modal
    Route::post('/create_subject',[SubjectController::class,'store']);// create record
    Route::post('/edit_subject',[SubjectController::class,'update']);// edit record 
    Route::post('/delete_subject/{id}',[SubjectController::class,'delete']);// delete record

    //Role And permission
    Route::get('/role',[RolePermissionController::class,'index'])->name('role');//get view
    Route::get('/role_create',[RolePermissionController::class,'show'])->name('create.role');//get create/edit record modal
    Route::post('/role_creator',[RolePermissionController::class,'store']);// create record
    Route::post('/role_update',[RolePermissionController::class,'update']);// edit record 
    Route::post('/role_delete/{id}',[RolePermissionController::class,'delete']);// delete record

    // User Manege
    Route::get('/user_add',[UserManegeController::class,'index'])->name('user.page')->middleware('super_admin');//get view
    Route::get('/user_modal',[UserManegeController::class,'show'])->name('user.add.page');//get create/edit record modal for all group
    Route::post('/user_add',[UserManegeController::class,'store'])->name('user.store');// create record for all group
    Route::post('/user_update',[UserManegeController::class,'update'])->name('user.update');// edit record  for all group 
    Route::post('/user_delete/{id}',[UserManegeController::class,'delete_user'])->name('user.delete');// delete record for all group 





});
// STOP // Route Prefixes 'admin' and 'middlewere' => 'auth' 