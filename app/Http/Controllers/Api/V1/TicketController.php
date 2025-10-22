<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\TicketRequest;
use App\Models\Ticket;

class TicketController extends Controller
{
    public function index()
    {
        return Ticket::all();
    }

    public function store(TicketRequest $request)
    {
    }

    public function show(Ticket $ticket)
    {
    }

    public function update(TicketRequest $request, Ticket $ticket)
    {
    }

    public function destroy(Ticket $ticket)
    {
    }
}
