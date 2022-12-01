<?php

use App\Http\Controllers\HomeController;
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
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/produk/{slug}', [HomeController::class, 'detail'])->name('detail');
Route::get('/blog/{slug}', [HomeController::class, 'detailPost'])->name('detail_post');
Route::post('/postComment', [HomeController::class, 'postComment'])->name('postComment');
Route::post('/blogComment', [HomeController::class, 'blogComment'])->name('blogComment');

Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/produk', [HomeController::class, 'product'])->name('produk');
Route::get('/produk/filter', [HomeController::class, 'productFilter'])->name('produk-filter');
Route::get('/agen', [HomeController::class, 'agen'])->name('agen');
Route::get('/daftar_agen', [HomeController::class, 'daftarAgen'])->name('daftar-agen');
Route::get('/terms_condition', [HomeController::class, 'terms'])->name('terms');
Route::get('/mengapa_kami', [HomeController::class, 'whyus'])->name('whyus');
Route::post('/postDaftarAgen', [HomeController::class, 'postDaftarAgen'])->name('postDaftarAgen');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/post_message', [HomeController::class, 'postMessage'])->name('postMessage');
Route::get('/blog', [HomeController::class, 'blog'])->name('blog');
Route::get('/blog/{categories}', [HomeController::class, 'blogCategories'])->name('blog-categories');
Route::get('/search', [HomeController::class, 'search'])->name('search');
Route::get('/{slug}', [HomeController::class, 'menu'])->name('menu');
Route::get('/produk/category/{category}', [HomeController::class, 'product_category'])->name('product_category');
