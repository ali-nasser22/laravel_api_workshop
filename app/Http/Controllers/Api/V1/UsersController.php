<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\UserRequest;
use App\Http\Resources\V1\UserResource;
use App\Models\User;
use App\Traits\ApiResponses;
use Symfony\Component\HttpFoundation\Response;

class UsersController extends Controller
{
    use ApiResponses;

    public function index()
    {
        return UserResource::collection(User::paginate(10));
    }

    public function store(UserRequest $request)
    {
    }

    public function show($id)
    {
        $user = User::find($id);
        if (!$user) {
            return $this->error('User not found', Response::HTTP_NOT_FOUND);
        }
        return UserResource::make($user);
    }

    public function update(UserRequest $request, User $user)
    {
    }

    public function destroy(User $user)
    {
    }
}
