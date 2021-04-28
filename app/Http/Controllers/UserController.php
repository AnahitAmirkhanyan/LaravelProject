<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddUserValidateRequest;
use App\Http\Requests\LoginUserValidateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register() {
        return view('register');
    }

    public function loginForm() {
        return view('login');
    }

    public function login(LoginUserValidateRequest $request) {
        $success = Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);
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
            $payload['image'] = $request->file->hashName();
            $request->file->storeAs('public', $request->file->hashName());
        }

        $user = User::create($payload);
        Auth::login($user);

        return redirect()->to('/home')->withSuccess('User created successfully!');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/home')->withSuccess('User has been logged out.');
    }

}
