<?php

/** Documentation */
Route::get('/documentation/{slug}', 'DocumentationController@show')->name('documentation.show');
Route::get('/documentation/{parent}/{slug}', 'DocumentationController@showChild')->name('documentation.child.show');
