<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\StrategyDesignPattern\Auth\GoogleLogin;
use App\StrategyDesignPattern\Auth\LoginContext;
use App\StrategyDesignPattern\Auth\LoginEmail;
use App\StrategyDesignPattern\Auth\LoginMobile;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $user = User::create($request->all());

        return response()->json($user);
    }

    public function login(AuthRequest $request)
    {
        $credentials = $request->validated();

        $type = $request->input('type');

        $strategy = match ($type) {
            'google' => new GoogleLogin(),
            'email' => new LoginEmail(),
            'mobile' => new LoginMobile(),
            default => throw new UnauthorizedHttpException('Unauthorized'),
        };

        if (!$strategy){
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $context = new LoginContext($strategy);
        $result = $context->execute($credentials);
        if (!$result) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        return response()->json([
            'user' => $result,
        ]);

    }
}
