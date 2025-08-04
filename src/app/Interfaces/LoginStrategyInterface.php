<?php
namespace App\Interfaces;

use App\Http\Requests\AuthRequest;

interface LoginStrategyInterface
{
    public function login(array $credentials);
}
