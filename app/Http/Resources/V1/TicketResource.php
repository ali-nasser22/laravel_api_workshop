<?php

namespace App\Http\Resources\V1;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Ticket */
class TicketResource extends JsonResource
{
    // public static $wrap = 'ticket'; default is 'data'

    public function toArray(Request $request): array
    {
        // you should see JSON:API Design at https://jsonapi.org, I followed it to design this response
        return [
            'type' => 'ticket',
            'id' => $this->id,
            'attributes' => [
                'title' => $this->title,
                // conditionally include 'description' in the response based on the route
                'description' => $this->when(
                    $request->routeIs('tickets.show'),
                    $this->description
                ),
                'status' => $this->status,
                'createdAt' => $this->created_at,
                'updatedAt' => $this->updated_at,
            ],
            'relationships' => [
                'author' => [
                    'data' => [
                        'type' => 'user',
                        'id' => $this->user_id
                    ],
                    'links' => [
                        'self' => 'todo',
                    ]
                ]
            ],
            // no idea why I included 'author' and 'includes' in the same response
            'includes' => [
                UserResource::make($this->user)
            ],
            'links' => [
                [
                    'self' => route("tickets.show", $this->id),
                ]
            ]
        ];
    }
}
