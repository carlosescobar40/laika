<?php
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\inf_movimientosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', [UserController::class,'register']);
Route::post('login', [UserController::class,'login']);

Route::group( ['middleware' => ["auth:sanctum"]], function(){
    //rutas
Route::get('user-profile', [UserController::class, 'userProfile']);
  
Route::get('logout', [UserController::class, 'logout']);
});


Route::resource('product',ProductController::class);
Route::resource('product',App\Http\Controllers\ProductController::class);

Route::get('/product',[ProductController::class,'index'])->middleware('auth:sanctum');
Route::get('/mostrarinf',[inf_movimientoController::class,'index'])->middleware('auth:sanctum');

Route::put('/product/{id}', [ProductController::class, 'update'])->middleware('auth:sanctum');