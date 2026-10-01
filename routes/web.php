<?php

use App\Models\Member;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $members = Member::with('documents')->latest()->get();
    return view('welcome', compact('members'));
});

Route::get('/login', function () {
    return 'Login page placeholder (Add Laravel Breeze or custom auth controller here).';
})->name('login');