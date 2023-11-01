<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\AuthController;

Route::get('/', [TicketController::class, 'index']);

Route::get('/ticket', [TicketController::class, 'create']);

Route::get('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'register']);
