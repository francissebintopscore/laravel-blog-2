<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
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

Route::get('/tag/search', function (Request $request) {
    
    $tags = App\Models\Tag::where('name', 'like', '%'.$request->search.'%')
            ->select( 'id', 'name', 'slug' )
            ->orderBy('name')
            ->limit(7)
            ->get();
    $jsonValue = $tags->toJson();
    echo $jsonValue;
    // dd($tags);
    // echo $request->search;
    // foreach ( $tags as $tag ){
    //     echo "<br>".$tag->name;
    // }
});
Route::resource('users', App\Http\Controllers\UserController::class);
Route::resource('blogs', App\Http\Controllers\BlogController::class);

