<?php


namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\User;


class LinkController extends Controller
{
    public function about() {
        return view('about');
    }

    public function layout() {
        return view('layout');
    }

    public function contact() {

        return view('contact');
    }

    public function post(Request $request) {
        $data = [
            'name'  => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ];

        User::create($data);

        return view('submitted', compact('data'));
    }

    public function redirect() {
        return redirect('/home');
    }

    public function home() {
        return view('home');
    }




}
