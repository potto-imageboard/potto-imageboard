<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
|
| Routes order:
|
| -> 1. POST
| -> 2. REDIRECT
| -> 3. GET
*/


use Illuminate\Support\Facades\DB;
use Potto\Thread;
use Potto\Post;
use Potto\Http\Controllers\ThreadController;

Route::post('dev/reply', 'ReplyController@storeReply');
Route::post('dev/thread', 'ThreadController@storeThread');

Route::get('query', function () {
    $t = Thread::replies();
    dd($t);
});

Route::get('/devz/thread', function () {
    $thread = new Thread;
    $thread->id = null;
    $thread->board_id = 1;
    $thread->upload_id = 0;
    $thread->post_get = 2;
    $thread->name = 'Antonymus';
    $thread->tripcode = '#aaabbb000';
    $thread->subject = 'this is subject';
    $thread->content = 'content is here';
    $thread->is_pinned = false;
    $thread->is_spoiler = false;
    $thread->is_locked = false;
    $thread->is_archived = false;
    $thread->ip = 0;
    if ($thread->save()) {
        return 'all good';
    }
    
});

Route::get('/dev/post/{id}', function ($id) {
    $post = new Post();

    $post->id          = null;
    $post->thread_id   = $id;
    $post->upload_id   = 0;
    $post->post_get    = 66;
    $post->is_spoiler  = false;
    $post->name        = 'I am Thors';
    $post->tripcode    = '#Antena9';
    $post->content     = 'This is post content<br />';

    $post->ip =          0;

    if ($post->save()) {
        return 'all good';
    }
    
})->where('id', '[0-9]+');

Route::get('/dev/{id}', function ($id) {
    return Thread::findOrFail($id);
    return  $thread;

})->where('id', '[0-9]+');



Route::get('/dev/delete/{id}', function ($id) {
    $thread = Thread::findOrFail($id);

    $thread->delete();

})->where('id', '[0-9]+');

Route::get('/', 'WelcomeController@index');



// Board first page
Route::get('/board/{name}', array('uses' => 'BoardController@index'))
->where('name', '[a-z]+');

// Board first page
Route::get('/board/{name}/thread/{id}', array('uses' => 'BoardController@thread'))
->where('name', '[a-z]+')
->where('id', '[0-9]+');
