<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\BlogCreatedEmail;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;

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

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/test', function () {

    // Mail::raw('This is test',function($message){
    //     $message->to('admin@localhost.com')
    //             ->subject('Test');
    // });
    // Mail::to('topscoretopscore@gmail.com')->send( new BlogCreatedEmail('Dynamic content'));


    $tt = '\App\Models\Story';
    $taggable_id = $tt::inRandomOrder()->limit(1)->pluck('id');
    echo$taggable_id->first();
    // $user = App\Models\User::find(1);
    // $user = Auth::user();
   
    // foreach ($user->roles as $role) {
        // echo "ddd".$role->pivot->created_at;
        // dd($user->roles);
    // }
    // $user = Auth::user();
    // $user->hasRole('superadmin');
})
->middleware('super_admin:superadmin')
->name('test');

Route::get('/tag/search', function (Request $request) {
    $tags = Tag::where('name', 'like', '%'.$request->search.'%')
            ->select('id', 'name', 'slug')
            ->orderBy('name')
            ->limit(7)
            ->get();
    $jsonValue = $tags->toJson();
    echo $jsonValue;
});

/**
 *
 * https://laraveldaily.com/multi-language-routes-and-locales-with-auth/
 */
// Route::group([
//     'prefix' => '{locale}',
//     'where' => ['locale' => '[a-zA-Z]{2}'],
//     'middleware' => 'setlocale'], function() {

// });
Route::resource('users', \App\Http\Controllers\UserController::class);
Route::resource('blogs', \App\Http\Controllers\BlogController::class);
