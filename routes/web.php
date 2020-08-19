<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Gcalendar;


Route::get('/', function () {
    return view('gcalendar');
});

Route::post("/register_event", 'Gcalendar@process_request');
