<?php
namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use JetBrains\PhpStorm\ArrayShape;

class AuthService
{
    #[ArrayShape(['user' => "mixed", 'token' => "mixed"])]
    public function register(array $data): array
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        return [
            'user' => $user,
            'token' => $user->createToken('appToken')->plainTextToken,
        ];
    }

    #[ArrayShape(['user' => "\Illuminate\Contracts\Auth\Authenticatable|null", 'token' => "mixed"])]
    public function login(array $data): array
    {
        if (!Auth::attempt($data)) {
            throw ValidationException::withMessages([
                'email' => ['Invalid credentials'],
            ]);
        }

        $user = Auth::user();
        return [
            'user' => $user,
            'token' => $user->createToken('appToken')->plainTextToken,
        ];
    }
}
