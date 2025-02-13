<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\AuthService;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function create()
    {
        return view('create');
    }

    public function register(AuthRequest $request)
    {
        try {
            $this->authService->register($request->validated());
            return to_route('dashboard.report');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withInput()->withErrors($e->errors());
        }
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return to_route('dashboard.report');
        } else {
            return back()->withErrors(['email' => 'Credenciais inválidas. Tente novamente.']);
        }
    }


    public function close(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }

    public function update(AuthRequest $request)
    {

        try {
            $this->authService->update($request->validated());
            return back()->with('success', 'Senha redefinida com sucesso!');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Erro ao redefinir a senha. Tente novamente.']);
        }
    }

}
