<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/test', function () {
    // $user = App\Models\User::find(1);   
   
    // foreach ($user->roles as $role) {
        // echo "ddd".$role->pivot->created_at;
        // dd($role->role);
    // }
    // dd($user->roles);
    $blog = App\Models\Blog::find(1); 
    $tag = Str::random(10);
    $blog->tags()->create([
        'name' => $tag,
        'slug' => Str::slug( $tag )
    ]);

});
Route::resource('users', App\Http\Controllers\UserController::class);
Route::resource('blogs', App\Http\Controllers\BlogController::class);

