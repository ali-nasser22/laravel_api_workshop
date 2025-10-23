<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\Api\V1\UserRequest;
use App\Http\Resources\V1\UserResource;
use App\Models\User;
use App\Traits\ApiResponses;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Symfony\Component\HttpFoundation\Response;

class UsersController extends ApiController
{
    use ApiResponses;

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function index()
    {
        if ($this->include('tickets')) {
            return UserResource::collection(User::with('tickets')->paginate(10));
        }
        return UserResource::collection(User::paginate(10));
    }

    public function store(UserRequest $request)
    {
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function show($id)
    {
        $user = User::find($id);
        if (!$user) {
            return $this->error('User not found', Response::HTTP_NOT_FOUND);
        }
        if ($this->include('tickets')) {
            return UserResource::make($user->load('tickets'));
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
