<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\StrategyDesignPattern\Auth\GoogleLogin;
use App\StrategyDesignPattern\Auth\LoginContext;
use App\StrategyDesignPattern\Auth\LoginEmail;
use App\StrategyDesignPattern\Auth\LoginMobile;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class AuthController extends Controller
{
    /**
     * @param RegisterRequest $request
     * @return JsonResponse
     *
     * @OA\Post(
     *     path="/api/register",
     *     summary="Register a new user",
     *     tags={"auth"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
    *             @OA\Property (property="name", type="string",example="sana"),
    *          @OA\Property (property="email",type="string", example="sana@gmail.com"),
    *          @OA\Property (property="password",type="string", example="123456"),
    *          @OA\Property (property="password_confrimation",type="string", example="123456"),
     *
     *         ),
     *     ),
     *     @OA\Response(
     *         response=200,
     *          description="user registerd successfuly",
     *          @OA\JsonContent(
     *              @OA\Property (property="token",type="string", description="Access token for user "),
     *              @OA\Property (property="user", type="string", description="user details"),
     *          ),
     *     ),@OA\Response(
     *          response=422,
     *           description="validation error",
     *           @OA\JsonContent (
     *               @OA\Property (property="message",type="string", description="request not valid "),
     *           ),
     *      ),
     * ),
     *
     * @OA\Info(
     *       version="0.0.0",
     *       title="Anophel API Documentation"
     *   )
     */
    public function register(RegisterRequest $request): \Illuminate\Http\JsonResponse
    {
        $user = User::create($request->all());

        return response()->json($user);
    }


    /**
     * @param AuthRequest $request
     * @return JsonResponse
     */
    public function login(AuthRequest $request): JsonResponse
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
