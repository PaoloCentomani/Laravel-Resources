<?php

// Support Routes...
Route::get('support', 'SupportController@create')->name('support.create');
Route::post('support', 'SupportController@store')->name('support.store');
