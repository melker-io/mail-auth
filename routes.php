<?php

Route::group(['namespace' => 'Melkerio\MailAuth\Http\Controllers', 'prefix' => 'mail-auth', 'middleware' => 'web'], function() {
	Route::get('/{token}', 'MailAuthController@login')->name('mail-auth.token-login');
});
