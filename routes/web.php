<?php

use Illuminate\Support\Facades\Route;


// Для всех
Route::get('/',
'App\Http\Controllers\ContactController@allData'
);

Route::get('/dashboard', 
    'App\Http\Controllers\ContactController@allData'
)->name('dashboard');

require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function() {
    // Для админа
    Route::middleware(['role:admin'])->group(function() {
        Route::get('/admin', function(){
            return view('admin');
        })->name('admin');

        Route::get(
            '/admin', 
            'App\Http\Controllers\AdminController@allData'
        )->name('admin-data');
        
        Route::get(
            '/admin/{id}', 
            'App\Http\Controllers\AdminController@showOneMessage'
        )->name('admin-data-one');

        Route::get(
            '/admin/{id}/update', 
            'App\Http\Controllers\AdminController@updateMessage'
        )->name('admin-update');

        Route::post(
            '/admin/{id}/update', 
            'App\Http\Controllers\AdminController@updateMessageSubmit'
        )->name('admin-update-submit');

        Route::get(
            '/admin/{id}/delete', 
            'App\Http\Controllers\AdminController@deleteMessage'
        )->name('admin-delete');

        Route::post(
            '/admin/{id}/delete', 
            'App\Http\Controllers\AdminController@deleteMessageSubmit'
        )->name('admin-delete-submit');

        Route::get(
            'messages', 
            'App\Http\Controllers\AdminController@categoryAdmin'
        )->name('admin-category');

        Route::post(
            'messages', 
            'App\Http\Controllers\AdminController@categoryAdminSubmit'
        )->name('admin-category-submit');

        Route::get(
            'messages/delete/{id}/{category}', 
            'App\Http\Controllers\AdminController@categoryDelete'
        )->name('category-delete');
        
    });

    // Для пользователя
    Route::group(['middleware'=>['auth']], function() {
        Route::get('/contact',
            'App\Http\Controllers\ContactController@showCategory'
        )->name('contact');
        
        Route::post(
            '/contact/submit',
            'App\Http\Controllers\ContactController@submit'
        )->name('contact-form');
        
        Route::get(
            '/contact/all', 
            'App\Http\Controllers\ContactController@allData'
        )->name('contact-data');
        
        Route::get(
            '/contact/all/{id}', 
            'App\Http\Controllers\ContactController@showOneMessage'
        )->name('contact-data-one');

        Route::get(
            '/userdata', 
            'App\Http\Controllers\ContactController@allDataUser'
        )->name('user-data');

        Route::get(
            '/userdata/{id}', 
            'App\Http\Controllers\ContactController@showOneMessageUser'
        )->name('user-data-one');

        Route::get(
            '/userdata/{id}/update', 
            'App\Http\Controllers\ContactController@updateMessage'
        )->name('user-update');

        Route::post(
            '/userdata/{id}/update', 
            'App\Http\Controllers\ContactController@updateMessageSubmit'
        )->name('user-update-submit');

        Route::post(
            '/userdata/{id}/delete', 
            'App\Http\Controllers\ContactController@deleteMessage'
        )->name('user-delete');
    });
});

