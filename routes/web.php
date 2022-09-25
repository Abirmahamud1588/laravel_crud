<?php


use App\Http\Controllers\crudcontroller;
use Illuminate\Support\Facades\Route;




Route::get('/',[crudcontroller::class,'home'])->name('home');
Route::get('signin',[crudcontroller::class,'signin'])->name('signin');
Route::post('insertdata', [crudcontroller::class,'insertdata'])->name('insert.data');
