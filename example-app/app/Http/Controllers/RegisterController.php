<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Show the registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        return view('signup');
    }

    public function RegisterAction(RegisterRequest $request) {
        $user = [
            'name' => $request->input('name'),
            'email'=> $request->input('email'),
            'password'=> $request->input('password'),
        ];
        return view('signup',['user' => $user]);
    }

}
