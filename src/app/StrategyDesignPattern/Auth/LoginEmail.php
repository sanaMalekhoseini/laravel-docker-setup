<?php
namespace App\StrategyDesignPattern\Auth;

use App\Interfaces\LoginStrategyInterface;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginEmail implements LoginStrategyInterface
{
    public function login(array $credentials)
    {
        if (empty($credentials['email'])) {
            return response()->json(['message' => 'Email is required.'], 400);
        }
        $user = User::where('email', $credentials['email'])->first();

        return [
            'token' => $user->createToken('auth_token')->plainTextToken,
            'user' => $user,
        ];
    }
}
