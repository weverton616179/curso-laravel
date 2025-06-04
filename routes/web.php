<?php

use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Route;

Route::resource("produtos", ProdutoController::class);

// Route::get('/', function () {
//     return view('welcome');
// });