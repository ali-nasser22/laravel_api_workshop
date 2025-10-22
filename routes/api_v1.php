<?php

use App\Http\Controllers\Api\V1\TicketController;

/* Ticket Routes*/
Route::apiResource('tickets', TicketController::class)->middleware('auth:sanctum');


