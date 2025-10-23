<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\Api\V1\TicketRequest;
use App\Http\Resources\V1\TicketResource;
use App\Models\Ticket;
use App\Traits\ApiResponses;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Symfony\Component\HttpFoundation\Response;

class TicketController extends ApiController
{
    use ApiResponses;

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function index()
    {
        if ($this->include('author')) {
            return TicketResource::collection(Ticket::with('user')->paginate(10));
        }
        return TicketResource::collection(Ticket::paginate(10));
    }

    public function store(TicketRequest $request)
    {
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function show($id) // I used $id and not Route Model Binding, so I can use my custom $this->error() response
    {
        $ticket = Ticket::find($id);
        if (!$ticket) {
            return $this->error('Ticket not found', Response::HTTP_NOT_FOUND);
        }
        if ($this->include('author')) {
            return TicketResource::make($ticket->load('user'));
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
