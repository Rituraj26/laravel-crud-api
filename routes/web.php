<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\User;

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

// User Routes

Route::post('/user', function() {
    $user = User::create([
        'name' => 'John Doe',
        'email' => 'johndoe@gmail.com',
        'password' => '123456'
    ]);
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/token', function() {
    return csrf_token();
});

Route::get('/read', function() {
    $posts = Post::all();

    foreach($posts as $post) {
        echo $post->title;
    }
});

Route::get('/find', function() {
    $posts = Post::where('is_admin', 1)->orderByDesc('id')->take(2)->get();

    foreach($posts as $post) {
        echo $post->title;
        echo "<br />";
    }
});

Route::post('/insert', function() {
    $post = new Post;
    $post->title = 'Second record';
    $post->body = 'A second record has been added';
    $post->is_admin = 1;

    $post->save();
});

Route::post('/create', function() {
    $post = Post::create([
        'title' => 'New record using create',
        'body' => 'A new record has been inserted using create method'
    ]);
});

Route::put('/update', function() {
    $post = Post::where('id', 1)->where('is_admin', 1)->update([
        'title' => 'This is the first updated record',
        'body' => 'The first record has been updated using the update method'
    ]);
});

Route::delete('/delete', function() {
    $post = Post::where('id', 6)->delete();
});

Route::delete('/softdelete', function() {
    $post = Post::where('id', 6)->delete();
});

Route::get('/restoretrash', function() {
    // $post = Post::withTrashed()->where('id', 6)->restore();
    $post = Post::withTrashed()->history()->restore();
    return $post;
});

Route::get('/checkiftrash', function() {
    $post = Post::withTrashed()->whereNotNull('deleted_at')->get();

    return $post;
});


Route::delete('/forcedelete', function() {
    $post = Post::withTrashed()->whereNotNull('deleted_at')->forceDelete();

    return $post;
});

// One to one relationship

Route::get('/user/{id}/post', function($id) {
    // return Post::find('user_id', $id)->user;
    return User::find($id)->post;
    
});