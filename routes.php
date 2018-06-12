<?php

Route::group(['namespace' => 'Melkerio\MailAuth\Http\Controllers', 'prefix' => 'mail-auth', 'middleware' => 'web'], function() {

	Route::get('/login/{token}', 'MailAuthController@authenticate')->name('mail-auth.confirm');
	Route::post('/login', 'MailAuthController@login')->name('mail-auth.login');
	Route::get('/login', 'MailAuthController@loginForm')->name('mail-auth.show');
	Route::post('/', 'MailAuthController@store');
});
