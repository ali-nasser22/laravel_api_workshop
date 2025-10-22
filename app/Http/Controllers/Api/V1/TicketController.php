<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\TicketRequest;
use App\Http\Resources\V1\TicketResource;
use App\Models\Ticket;
use App\Traits\ApiResponses;
use Symfony\Component\HttpFoundation\Response;

class TicketController extends Controller
{
    use ApiResponses;

    public function index()
    {
        return TicketResource::collection(Ticket::paginate(10));
    }

    public function store(TicketRequest $request)
    {
    }

    public function show($id) // I used $id and not Route Model Binding, so I can use my custom $this->error() response
    {
        $ticket = Ticket::find($id);
        if (!$ticket) {
            return $this->error('Ticket not found', Response::HTTP_NOT_FOUND);
        }
        return TicketResource::make($ticket);
    }

    public function update(TicketRequest $request, Ticket $ticket)
    {
    }

    public function destroy(Ticket $ticket)
    {
    }
}
