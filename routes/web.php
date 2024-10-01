<?php

use Illuminate\Support\Facades\Route;

Route::get('/{any}', function () {
    return view('app');
})->where('any', '^(?!api).*$'); //regex that ensures the route doesn’t match any route that starts with /api