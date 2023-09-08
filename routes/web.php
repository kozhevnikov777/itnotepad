<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Post\Like\CheckboxController;


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

/*
Route::get('/', [MainController::class,'home'] );

Route::get('/home', [MainController::class,'home']);

Route::get('/about', [MainController::class,'about']);

Route::get('/records', [MainController::class,'records'])->name('records');

Route::post('/records/check', [MainController::class,'records_check']);
*/





Route::group(['namespace' => 'App\Http\Controllers\Main'], function () {
    Route::get('/', IndexController::class)->name('main.index');
});
Route::group(['namespace' => 'App\Http\Controllers\Post', 'prefix' => 'posts'], function () {
    Route::get('/', IndexController::class)->name('post.index');
    Route::get('/{post}', ShowController::class)->name('post.show');
    Route::group(['namespace' => 'Comment', 'prefix' => '{post}/comments'], function () {
        Route::post('/', StoreController::class)->name('post.comment.store');
    });
    Route::group(['namespace' => 'Like', 'prefix' => '{post}/likes'], function () {
        Route::post('/', StoreController::class)->name('post.like.store'); 
    });
    Route::group(['namespace' => 'Dislike', 'prefix' => '{post}/dislikes'], function () {
        Route::post('/', StoreController::class)->name('post.dislike.store'); 
    });

});

Route::group(['namespace' => 'App\Http\Controllers\Category', 'prefix' => 'categories'], function () {
    Route::get('/', IndexController::class)->name('category.index');
    Route::group(['namespace' => 'Post', 'prefix' => '{category}/posts'], function () {
        Route::get('/', IndexController::class)->name('category.post.index');
    });
});

Route::group(['namespace' => 'App\Http\Controllers\Personal', 'prefix' => 'personal', 'middleware' => ['auth']], function() {
    Route::group(['namespace' => 'Main', 'prefix' => 'main'], function () {
        Route::get('/', IndexController::class)->name('personal.main.main');
    });
    Route::group(['namespace' => 'Post', 'prefix' => 'posts'], function () {
        Route::get('/', IndexController::class)->name('personal.post.main');
        Route::get('/create', CreateController::class)->name('personal.post.create');
        Route::post('/', StoreController::class)->name('personal.post.store');
        Route::get('/{post}', ShowController::class)->name('personal.post.show');
        Route::get('/{post}/edit', EditController::class)->name('personal.post.edit');
        Route::patch('/{post}', UpdateController::class)->name('personal.post.update');
        Route::delete('/{post}', DeleteController::class)->name('personal.post.delete');
    });
    Route::group(['namespace' => 'Liked', 'prefix' => 'liked'], function () {
        Route::get('/', IndexController::class)->name('personal.liked.main');
        Route::delete('/{post}', DeleteController::class)->name('personal.liked.delete');
    });
    Route::group(['namespace' => 'Disliked', 'prefix' => 'disliked'], function () {
        Route::get('/', IndexController::class)->name('personal.disliked.main');
        Route::delete('/{post}', DeleteController::class)->name('personal.disliked.delete');
    });
    Route::group(['namespace' => 'Comment', 'prefix' => 'comments'], function () {
        Route::get('/', IndexController::class)->name('personal.comment.main');
        Route::patch('/{comment}', UpdateController::class)->name('personal.comment.update');
        Route::get('/{comment}/edit', EditController::class)->name('personal.comment.edit');
        Route::delete('/{comment}', DeleteController::class)->name('personal.comment.delete');
    });
    Route::group(['namespace' => 'Calendar', 'prefix' => 'calendar'], function () {
        Route::get('/', IndexController::class)->name('personal.calendar.main');
    });
});

Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'admin']], function() {
    Route::group(['namespace' => 'Main'], function () {
        Route::get('/', IndexController::class)->name('admin.main.main');
    });

    Route::group(['namespace' => 'Post', 'prefix' => 'posts'], function () {
        Route::get('/', IndexController::class)->name('admin.post.main');
        Route::get('/create', CreateController::class)->name('admin.post.create');
        Route::post('/', StoreController::class)->name('admin.post.store');
        Route::get('/{post}', ShowController::class)->name('admin.post.show');
        Route::get('/{post}/edit', EditController::class)->name('admin.post.edit');
        Route::get('/{post}/refused', RefusedController::class)->name('admin.post.refused');
        Route::patch('/{post}', UpdateController::class)->name('admin.post.update');
        Route::delete('/{post}', DeleteController::class)->name('admin.post.delete');
        Route::post('/export', ExportController::class)->name('admin.post.export');
        Route::post('/import', ImportController::class)->name('admin.post.import');
    });

    Route::group(['namespace' => 'Category', 'prefix' => 'categories'], function () {
        Route::get('/', IndexController::class)->name('admin.category.main');
        Route::get('/create', CreateController::class)->name('admin.category.create');
        Route::post('/', StoreController::class)->name('admin.category.store');
        Route::get('/{category}', ShowController::class)->name('admin.category.show');
        Route::get('/{category}/edit', EditController::class)->name('admin.category.edit');
        Route::patch('/{category}', UpdateController::class)->name('admin.category.update');
        Route::delete('/{category}', DeleteController::class)->name('admin.category.delete');
    });

    Route::group(['namespace' => 'Tag', 'prefix' => 'tags'], function () {
        Route::get('/', IndexController::class)->name('admin.tag.main');
        Route::get('/create', CreateController::class)->name('admin.tag.create');
        Route::post('/', StoreController::class)->name('admin.tag.store');
        Route::get('/{tag}', ShowController::class)->name('admin.tag.show');
        Route::get('/{tag}/edit', EditController::class)->name('admin.tag.edit');
        Route::patch('/{tag}', UpdateController::class)->name('admin.tag.update');
        Route::delete('/{tag}', DeleteController::class)->name('admin.tag.delete');
    });

    Route::group(['namespace' => 'User', 'prefix' => 'users'], function () {
        Route::get('/', IndexController::class)->name('admin.user.main');
        Route::get('/create', CreateController::class)->name('admin.user.create');
        Route::post('/', StoreController::class)->name('admin.user.store');
        Route::get('/{user}', ShowController::class)->name('admin.user.show');
        Route::get('/{user}/edit', EditController::class)->name('admin.user.edit');
        Route::patch('/{user}', UpdateController::class)->name('admin.user.update');
        Route::delete('/{user}', DeleteController::class)->name('admin.user.delete');
    });

    Route::group(['namespace' => 'Liked', 'prefix' => 'liked'], function () {
        Route::get('/', IndexController::class)->name('admin.liked.main');
        Route::delete('/{post}', DeleteController::class)->name('admin.liked.delete');
        Route::post('/checkbox', [CheckboxController::class, 'checkbox'])->name('admin.checkbox.main');
    });

    Route::group(['namespace' => 'Refused', 'prefix' => 'refused'], function () {
        Route::get('/', IndexController::class)->name('admin.refused.main');
    });

    Route::group(['namespace' => 'Analyzed', 'prefix' => 'analyzed'], function () {
        Route::get('/', IndexController::class)->name('admin.analyzed.main');
    });

    Route::group(['namespace' => 'Disliked', 'prefix' => 'disliked'], function () {
        Route::get('/', IndexController::class)->name('admin.disliked.main');
        Route::delete('/{post}', DeleteController::class)->name('admin.disliked.delete');
    });
});

/*
Route::get('/user/{id}/{name}', function ($id, $name) {
    return 'ID: '. $id. " Name: ". $name;
});
*/



Auth::routes();

/* Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); */

