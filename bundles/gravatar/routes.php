<?php 

Route::get('(:bundle)/form', 'gravatar::preview@form');
Route::post('(:bundle)/preview', 'gravatar::preview@preview');