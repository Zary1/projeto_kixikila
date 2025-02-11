<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Contacto; 
use App\Http\Controllers\Poupancas; 
use App\Http\Controllers\User; 
use App\Http\Controllers\Admin;
use App\Http\Middleware\AdminAuth;


Route::post('/contactoForm',[Contacto::class,'store']);
Route::get('/', function () {
    return view('welcome');
});


// Routes dos administradores
Route::get('/admin',[Admin::class,'index']);
Route::get('/allAdmin',[Admin::class,'allAdmin'])->middleware(AdminAuth::class);
Route::get('/registro',[Admin::class,'showFormulario']);
Route::post('/registroAdmin',[Admin::class,'store']);
Route::get('/listaAdmin',[Admin::class,'listAdmin']);
Route::get('/loginAdmin',[Admin::class,'showLogin']);
Route::post('/loginAdmin',[Admin::class,'storeLogin']);
Route::post('/logoutAdmin',[Admin::class,'logout']);
Route::delete('/allAdmin/{id}',[Admin::class,'destroy']);
Route::get('/edit/admin/{id}',[Admin::class,'showEdit']);
Route::put('/edit/admin/{id}',[Admin::class,'update']);
//Routes crear grupos para popança
Route::get('/poupanca',[Poupancas::class,'showPoupanca']); 
Route::post('/poupanca',[Poupancas::class,'store']); 
Route::get('/poupancas',[Poupancas::class,'poupanca']); 
Route::delete('/poupancas/{id}',[Poupancas::class,'destroy']); 
Route::get('/edit/poupancas/{id}',[Poupancas::class,'showEdit']);  
Route::put('/edit/poupancas/{id}',[Poupancas::class,'update']);  

// Routes utentes

Route::get('/utente',[User::class,'index'])->middleware('auth'); 
Route::get('/dashboard',[User::class,'dashboard'])->middleware('auth'); 
Route::post('/poupancas/join/{id}',[User::class,'joinPoupanca'])->middleware('auth'); 
Route::get('/sobre',[User::class,'sobre']); 

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });
