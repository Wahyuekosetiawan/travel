<?php

use App\Http\Controllers\WisataController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/wisata');
});

Route::resource('wisata', WisataController::class);
