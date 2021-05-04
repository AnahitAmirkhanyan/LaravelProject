<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface IUserService
{
    public function login($payload);

    public function createUser($payload);

    public function logout(Request $request);
}
