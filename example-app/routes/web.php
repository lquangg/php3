<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PostController;
use App\Models\Customer;
use Illuminate\Support\Facades\Route;

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
Route::get('/customer',[CustomerController::class,'index']);
Route::get('/post',[PostController::class,'index']);
Route::get('/post/{id}/{title}',[PostController::class,'index']);
Route::get('/hcn/{cd}/{cr}',[CustomerController::class,'hcn']);
Route::get('/list',[CustomerController::class,'customer']);
Route::get('/ds',[CustomerController::class,'list']);
// khi tồn tại 1 action thì sẽ thực hiện router post
Route::post('/ds',[CustomerController::class,'list'])->name('search');

Route::match(['get','post'],'addCustomer',[CustomerController::class, 'add_customer'])->name('add_customer');
Route::match(['get', 'post'], 'customers/edit/{id}', [CustomerController::class, 'edit_customer'])->name('edit_customer');
Route::get('delete_customer/{id}',[CustomerController::class,'delete_customer'])->name('delete_customer');


