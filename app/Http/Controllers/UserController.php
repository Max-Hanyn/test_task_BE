<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    protected UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index(): JsonResponse
    {
        $users = $this->userService->getAllUsers();
        return response()->json($users, 200);
    }

    public function store(StoreUserRequest $request): JsonResponse
    {
        $user = $this->userService->createUser($request->validated());
        return response()->json($user, 201);
    }

    public function show($id): JsonResponse
    {
        $user = $this->userService->getUserById($id);
        return response()->json($user, 200);
    }

    public function update(UpdateUserRequest $request, $id): JsonResponse
    {
        $user = $this->userService->getUserById($id);
        $updatedUser = $this->userService->updateUser($user, $request->validated());
        return response()->json($updatedUser, 200);
    }

    public function destroy($id): JsonResponse
    {
        $user = $this->userService->getUserById($id);
        $result = $this->userService->deleteUser($user);
        return response()->json($result, 200);
    }
}
