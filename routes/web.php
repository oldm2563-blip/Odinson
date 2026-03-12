<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\MtoMController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CatagoryController;


//GET
Route::get('/login' , [AuthController::class, 'login_form']);
Route::get('/register', [AuthController::class, 'register_form']);
Route::get('/logout', [UserController::class, 'logout']);
Route::get('/', [CatagoryController::class, 'index'])->middleware(['isActive', 'islogedin']);
Route::get('/categories', [CatagoryController::class, 'show_categories'])->middleware(['islogedin']);
Route::get('/edit-category/{catagory}', [CatagoryController::class, 'edit_form_category'])->middleware(['islogedin']);
Route::get('/links', [LinkController::class, 'link_page'])->middleware(['islogedin']);
Route::get('/bin', [LinkController::class, 'bin'])->middleware(['islogedin'])->withTrashed();
Route::get('/category/{catagory}', [CatagoryController::class, 'cat'])->middleware(['islogedin']);
Route::get('/link/{link}', [LinkController::class, 'line'])->middleware(['islogedin']);
Route::get('/share-link/{link}', [LinkController::class, 'share'])->middleware(['islogedin']);
Route::get('/favors', [LinkController::class, 'favors'])->middleware(['islogedin']);
//POST
Route::post('/login', [UserController::class, 'login']);
Route::post('/register', [UserController::class, 'create_account']);
Route::post('/create_cat', [CatagoryController::class, 'create_category'])->middleware(['islogedin']);
Route::post('/category-delete/{catagory}', [CatagoryController::class, 'delete_category'])->middleware(['islogedin']);
Route::post('/edit_cat/{catagory}', [CatagoryController::class, 'edit_category'])->middleware(['islogedin']);
Route::post('/create_link', [LinkController::class, 'create_link'])->middleware(['islogedin']);
Route::post('/create_tag', [TagController::class, 'create_tag'])->middleware(['islogedin']);
Route::post('/assign_tag/{link}', [MtoMController::class, 'give_tag'])->middleware(['islogedin']);
Route::post('/search', [LinkController::class, 'search'])->middleware(['islogedin']);
Route::post('/link-delete/{link}', [LinkController::class, 'delete'])->middleware(['islogedin']);
Route::post('/restore/{link}', [LinkController::class, 'restore'])->middleware(['islogedin'])->withTrashed();
Route::post('/share_link/{link}', [LinkController::class, 'sharel'])->middleware(['islogedin']);
Route::post('/favor/{link}', [MtoMController::class, 'favor'])->middleware(['islogedin']);

//admin pages
Route::get('/admin', [UserController::class, 'admin'])->middleware(['islogedin', 'admin']);
Route::get('/admin/categories', [AdminController::class, 'categories'])->middleware(['islogedin', 'admin']);
Route::get('/admin/links', [AdminController::class, 'links'])->middleware(['islogedin', 'admin']);
Route::get('/admin/users', [AdminController::class, 'users'])->middleware(['islogedin', 'admin']);
Route::get('/admin/logs', [AdminController::class, 'logs'])->middleware(['islogedin', 'admin']);



