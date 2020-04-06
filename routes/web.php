<?php

Route::redirect('/', '/login');

Route::redirect('/home', '/admin');

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');

    Route::get('movements/myindex', 'MovementsController@myindex')->name('movements.myindex');

    Route::get('movements/allindex', 'MovementsController@allindex')->name('movements.allindex');

    Route::post('movements/allindex', 'MovementsController@allindex')->name('movements.allindex');

    Route::resource('movements', 'MovementsController');

    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');

    Route::resource('permissions', 'PermissionsController');

    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');

    Route::resource('roles', 'RolesController');

    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');

    Route::resource('users', 'UsersController');

    Route::resource('profiles', 'ProfilesController');

    Route::delete('announcements/destroy', 'AnnouncementsController@massDestroy')->name('announcements.massDestroy');

    Route::resource('announcements', 'AnnouncementsController');

    Route::get('minutes/{minute}/printpdf', 'MinutesController@printPDF')->name('minutes.printPDF');

    Route::resource('minutes', 'MinutesController');

    Route::get('verifies/{minute}/edit', 'VerifiesController@edit')->name('verifies.edit');

    Route::resource('verifies', 'VerifiesController');
});

Route::group(['prefix' => 'reports', 'as' => 'reports.', 'namespace' => 'Reports', 'middleware' => ['auth']], function () {

    Route::get('minutereport/{minute}', 'MinuteReportController@index')->name('minutereports.index');
});
