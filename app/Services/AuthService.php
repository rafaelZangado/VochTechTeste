<?php
namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthService
{
    public function register(array $data)
    {

        if (User::where('email', $data['email'])->exists()) {
            throw ValidationException::withMessages(['email' => 'O email já está cadastrado.']);
        }
        //Desculpa minha ignorancia nessa parte, mas normalmente eu criaria um Repositorio e faria um tratamente diferente

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);


        Auth::login($user);

        return $user;
    }

    public function update(array $dados)
    {
        $user = User::where('email', $dados['email'])->first();

        if (!$user) {
            throw ValidationException::withMessages(['email' => 'E-mail não encontrado.']);
        }

        $user->password = Hash::make($dados['password']);
        $user->save();

        return $user;

    }
}

