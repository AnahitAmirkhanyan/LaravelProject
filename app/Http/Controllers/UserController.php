<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddUserValidateRequest;
use App\Http\Requests\LoginUserValidateRequest;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function register() {
        return view('register');
    }

    public function loginForm() {
        return view('login');
    }

    public function login(LoginUserValidateRequest $request) {
        $success = $this->userService->login($request);
        if($success){
            return redirect()->to('home')->withSuccess('You have successfully logged in!');
        }

        return redirect()->to('home')->with('error','Incorrect username or password.');
    }

    public function createUser(AddUserValidateRequest $request) {
        $payload = [
            'first_name'  => $request->first_name,
            'last_name'  => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];
        if($request->hasFile('file')){
            $payload['image'] = $request->file;
        }
        $user = $this->userService->createUser($payload);
        Auth::login($user);

        return redirect()->to('/home')->withSuccess('User created successfully!');
    }

    public function logout(Request $request) {
        $this->userService->logout($request);

        return redirect('/home')->withSuccess('User has been logged out.');
    }

}
