<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use JetBrains\PhpStorm\ArrayShape;

class UserService
{
    public function getAllUsers($pagination = 5)
    {
        return User::paginate($pagination);
    }

    public function createUser(array $data)
    {
        $data['password'] = Hash::make($data['password']);
        return User::create($data);
    }

    public function getUserById($id)
    {
        return User::findOrFail($id);
    }

    public function updateUser(User $user, array $data): User
    {
        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }
        $user->update($data);
        return $user;
    }

    #[ArrayShape(['message' => "string"])] public function
    deleteUser(User $user): array
    {
        $user->delete();
        return ['message' => 'User deleted successfully'];
    }
}

