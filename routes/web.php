<?php


use App\Http\Controllers\crudcontroller;
use Illuminate\Support\Facades\Route;




Route::get('/',[crudcontroller::class,'home'])->name('home');
Route::get('signin',[crudcontroller::class,'signin'])->name('signin');
Route::post('insertdata', [crudcontroller::class,'insertdata'])->name('insert.data');
Route::get('dataedit/{id}',[crudcontroller::class,'dataedit'])->name('data.edit');
Route::get('datadel/{id}',[crudcontroller::class,'datadel'])->name('data.del');
Route::post('updatedata/{id}', [crudcontroller::class,'updatedata'])->name('update.data');


