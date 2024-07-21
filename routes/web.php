<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix'=> 'members'], function () 
{
    Route::get('/', [App\Http\Controllers\MembersController::class, 'index'])->name('member_index');
    Route::get('/create', [App\Http\Controllers\MembersController::class, 'create'])->name('member_create');
    Route::post('/', [App\Http\Controllers\MembersController::class, 'store'])->name('member_store');
    Route::get('/{id}', [App\Http\Controllers\MembersController::class, 'edit'])->name('member_edit');
    Route::put('/{id}', [App\Http\Controllers\MembersController::class, 'update'])->name('member_update');
    Route::delete('/{id}', [App\Http\Controllers\MembersController::class, 'destroy'])->name('member_delete');
});
