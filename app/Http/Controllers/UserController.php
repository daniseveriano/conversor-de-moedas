<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function auth(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'E-mail é obrigatório',
            'password.required' => 'Senha é obrigatória',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect('/');
        } else {
            return redirect()->back()->with('danger', 'E-mail ou senha inválida');
        }
    }

    public function signup()
    {
        return view('signup');
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ], [
            'name.required' => "Nome é obrigatório",
            'email.required' => 'E-mail é obrigatório',
            'password.required' => 'Senha é obrigatória',
        ]);

        if (!User::where('email', $request->email)->First()) {
            $user = new User;

            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);

            $user->save();

            return redirect('/login');
        } else {
            return redirect()->back()->with('danger', 'E-mail já existe! Faça seu Login!');
        }
    }
}
