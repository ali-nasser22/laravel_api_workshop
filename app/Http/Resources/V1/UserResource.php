<?php

namespace App\Http\Resources\V1;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin User */
class UserResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'type' => 'user',
            'id' => $this->id,
            'attributes' => [
                'name' => $this->name,
                'email' => $this->email,
                // conditionally add those 3 attributes to response based on the route
                $this->mergeWhen(
                    $request->routeIs('users.*'),
                    [
                        'emailVerifiedAt' => $this->email_verified_at,
                        'createdAt' => $this->created_at,
                        'updatedAt' => $this->updated_at,
                    ]
                ),
                'includes' => TicketResource::collection($this->whenLoaded('tickets'))
            ],
            'links' => [
                'self' => route('users.show', $this->id),
            ]
        ];
    }
}
