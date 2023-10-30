<?php

namespace App\Services\impl;

use App\Services\UserService;


class UserServiceImpl implements UserService
{
    private array $users = [
        "aswin" => "rahasia"
    ];

    function login(string $user, string $password): bool
    {
        if (!isset($this->users[$user])) {
            return false;
        }

        $correctPass = $this->users[$user];
        return $password == $correctPass;
    }
}
