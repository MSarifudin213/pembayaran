<?php

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
Route::get('/mobile', function () {
    return 'room_moblie';
    
});

Route::get('/', 'App\Http\Controllers\AdminController@index');


// Auth::routes();
// // Route::get('/home', 'HomeController@index')->name('home');
// Route::match(['get', 'post'], '/register', function () {
//     return redirect ('/login');
// })->name('register');

Route::get('/login', 'App\Http\Controllers\AuthController@login')->name('login');
Route::post('/login', 'App\Http\Controllers\AuthController@postLogin');
Route::get('/register', 'App\Http\Controllers\AuthController@register');
Route::post('/register', 'App\Http\Controllers\AuthController@postRegister');
Route::get('/logout', 'App\Http\Controllers\AuthController@logout')->name('logout');

// Route::group(['middleware' => ['auth']], function() {
    // Route::get('/logout', 'App\Http\Controllers\AuthController@logout');
            
        Route::get('/admin', 'App\Http\Controllers\AdminController@index');
        Route::get('/admin/people/list', 'App\Http\Controllers\AdminController@peopleList');
        Route::get('/admin/people/room/{id}', 'App\Http\Controllers\AdminController@room');

        Route::post('/admin/message/send/{id}', 'App\Http\Controllers\AdminController@messageSend');

        Route::post('/api/login', 'App\Http\Controllers\ApiController@login');
        Route::post('/api/register', 'App\Http\Controllers\ApiController@register');
        Route::get('/api/get_message/{receiver_id}', 'App\Http\Controllers\ApiController@messageGet');
        Route::post('/api/send_message/', 'App\Http\Controllers\ApiController@messageSend');
        Route::get('/api/room/{sender_id}', 'App\Http\Controllers\ApiController@room');
        Route::get('/api/check/{id}/{count}', 'App\Http\Controllers\ApiController@checkNewMessage');


        Route::get('storage/{filename}', function ($filename){
            $path = storage_path("app/public/". $filename);
            if (!File::exists($path)) {
                abort(404);
            }
        
            $file = File::get($path);
            $type = File::mimeType($path);
        
            $response = Response::make($file, 200);
            $response->header("Content-Type", $type);
        
            return $response;
        });

        // pesanan

        Route::get('/pesanan', 'App\Http\Controllers\DonationController@index')->name('donation.index');
        Route::get('/pesanan/buat', 'App\Http\Controllers\DonationController@create')->name('donation.create');
        Route::get('/pesanan/{pesanan_id}','App\Http\Controllers\DonationController@show')->name('donation.show');
        Route::delete('/pesanan{pesanan_id}', 'App\Http\Controllers\DonationController@destroy')->name('donation.destroy');

        // product
        Route::resource('product', 'App\Http\Controllers\ProductController')->except(['show']);
        Route::get('/product/bulk', 'App\Http\Controllers\ProductController@massUploadForm')->name('product.bulk'); 
        Route::post('/product/bulk', 'App\Http\Controllers\ProductController@massUpload')->name('product.saveBulk');

        // Auth::routes();




// });

