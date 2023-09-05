<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

route::get('/',[HomeController::class,'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

route::get('/redirect',[HomeController::class,'redirect'])->middleware('auth','verified');

// path for view category page
route::get('/view_category',[AdminController::class,'view_category']);

// path for add category in db
route::post('/add_category',[AdminController::class,'add_category']);

// path for delte category from db
route::get('/delete_category/{id}',[AdminController::class,'delete_category']);

// path for view product category in form
route::get('/view_product',[AdminController::class,'view_product']);

// path to add product
route::post('/add_product',[AdminController::class,'add_product']);

// path to show product
route::get('/show_product',[AdminController::class,'show_product']);

// path to delete product
route::get('/delete_product/{id}',[AdminController::class,'delete_product']);

// path to update product
route::get('/update_product/{id}',[AdminController::class,'update_product']);

// path to update product confirm
route::post('/update_product_confirm/{id}',[AdminController::class,'update_product_confirm']);

// path to show  orders  for admin
route::get('/order',[AdminController::class,'order']);

// path to delivered
route::get('/delivered/{id}',[AdminController::class,'delivered']);

// path to print pdf
route::get('/print_pdf/{id}',[AdminController::class,'print_pdf']);

// path to send email to specific user
route::get('/send_email/{id}',[AdminController::class,'send_email']);

// path to send_user_email (form action)
route::post('/send_user_email/{id}',[AdminController::class,'send_user_email']);

// path for search
route::get('/search',[AdminController::class,'searchdata']);













// path to view product details
route::get('/product_details/{id}',[HomeController::class,'product_details']);

// pathe to add products to cart
route::post('/add_cart/{id}',[HomeController::class,'add_cart']);

// path to show cart page
route::get('/show_cart',[HomeController::class,'show_cart']);

// path to remove cart 
route::get('/remove_cart/{id}',[HomeController::class,'remove_cart']);

// path for cash_order
route::get('/cash_order',[HomeController::class,'cash_order']);

// path for payment strip
route::get('/stripe/{totalprice}',[HomeController::class,'stripe']);

// path for dtripe with totaprice 
Route::post('stripe/{totalprice}',[HomeController::class, 'stripePost'])->name('stripe.post');

// path to  show order
route::get('/show_order',[HomeController::class,'show_order']);

// path to cancel order
route::get('/cancel_order/{id}',[HomeController::class,'cancel_order']);

// path to add_comment
route::post('/add_comment',[HomeController::class,'add_comment']);

// path to add_reply
route::post('/add_reply',[HomeController::class,'add_reply']);

// path to search a specific product
route::get('/product_search',[HomeController::class,'product_search']);

// path to link page products
route::get('/products',[HomeController::class,'product']);

// path for new page search_product for serach
route::get('/search_product',[HomeController::class,'search_product']);









