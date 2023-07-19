<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DisplayController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[DisplayController::class,'index'])->name('Products.index');;
Route::get('products/create', [DisplayController::class,'create'])->name('Products.create');
Route::post('products/store',[DisplayController::class,'store'])->name('Products.store');
Route::get('products/{id}/edit', [DisplayController::class,'edit']);
Route::put('products/{id}/update', [DisplayController::class,'update']);
Route::delete('products/{id}/delete', [DisplayController::class,'destroy']);

// Route::get('send-email',function(){
//         $data['email'] = 'vandunayak4000@gmail.com';
//          dispatch(new SendEmailJob($data));
//          dd('Email Send Successfully');
// });