<?php


Route::group(
    ['prefix' => App\Http\Middleware\Locale::getLocale(), 'middleware' => 'locale'],
    function () {
        Route::get('/', 'HomeController@index')->name('home');

        Route::prefix('admin')
            ->name('admin.')
            ->middleware('admin')
            ->namespace('Admin')
            ->group(function () {
                Route::get('/', 'IndexController@show')->name('index');
                Route::resource('users', 'UsersController');
                Route::resource('categories', 'CategoriesController')->except(['destroy', 'show']);
                Route::resource('services', 'ServicesController');
            });
    });



Auth::routes();

Route::match(['get', 'post'], '/resend', ['uses' => 'Auth\ResendTokenController@index', 'as' => 'resend_activation']);
Route::get('/verifyemail/{token}', 'Auth\RegisterController@verify');


