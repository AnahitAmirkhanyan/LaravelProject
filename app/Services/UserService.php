<?php


namespace App\Services;

use \App\Interfaces\IUserService;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserService implements IUserService
{

    public function login($payload)
    {
        return Auth::attempt([
            'email' => $payload->email,
            'password' => $payload->password
        ]);
    }

    public function createUser($payload)
    {
        // $request->file->storeAs('public', $request->file->hashName());
        if($payload['image']){
            $payload['image']->storeAs('public', $payload['image']->hashName());
            $payload['image'] = $payload['image']->hashName();
        }

        return User::create($payload);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    }
}
