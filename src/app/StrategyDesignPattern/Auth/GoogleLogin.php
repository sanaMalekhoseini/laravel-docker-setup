<?php
namespace App\StrategyDesignPattern\Auth;

use App\Interfaces\LoginStrategyInterface;

class GoogleLogin  implements LoginStrategyInterface
{
    public function login(array $credentials)
    {
        try {
//            $googleUser = Socialite::driver('google')->user();
        }catch (\Exception $exception){}
    }
}
