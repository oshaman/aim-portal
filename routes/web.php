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
                Route::resource('categories', 'CategoriesController')->except(['destroy']);
                Route::resource('services', 'ServicesController');
            });

        Route::prefix('account')
            ->name('account.')
            ->middleware('account')
            ->namespace('Account')
            ->group(function () {
                Route::get('/', 'IndexController@show')->name('index');
            });
    });



Auth::routes();

Route::match(['get', 'post'], '/resend', ['uses' => 'Auth\ResendTokenController@index', 'as' => 'resend_activation']);
Route::get('/verifyemail/{token}', 'Auth\RegisterController@verify');


