<?php

// MyVendor\contactform\src\routes\web.php
Route::group(['namespace' => 'App\Http\Controllers\DaxControllers', 'middleware' => ['web']], function(){
    Route::get('contact', 'ContactFormController@index');
    Route::post('contact', 'ContactFormController@sendMail')->name('contact');
});
