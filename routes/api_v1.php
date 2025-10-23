<?php

use App\Http\Controllers\Api\V1\TicketController;
use App\Http\Controllers\Api\V1\UsersController;

/* Ticket Routes*/
Route::apiResource('tickets', TicketController::class)->middleware('auth:sanctum');

/* User Routes*/
Route::apiResource('users', UsersController::class)->middleware('auth:sanctum');
