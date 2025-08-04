<?php
namespace App\StrategyDesignPattern\Auth;

use App\Interfaces\LoginStrategyInterface;

class LoginContext
{
    protected LoginStrategyInterface $loginStrategy;
    public function __construct(LoginStrategyInterface $loginStrategy)
    {
        $this->loginStrategy = $loginStrategy;
    }

    public function execute(array $credentials): ?array
    {
        return $this->loginStrategy->login($credentials);
    }
}
