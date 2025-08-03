<?php
namespace App\StrategyDesignPattern\Auth;
use App\Interfaces\LoginStrategyInterface;
use App\Models\User;

class LoginMobile implements LoginStrategyInterface {
    public function login(array $credentials) {

        $user = User::where('mobile', $credentials['mobile'])->first();

        if (!$user) {
            return false;
        }

        if ($credentials['password'] != $user->password) {
            return false;
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return [
            'user' => $user,
            'token' => $token,
        ];

    }
}
