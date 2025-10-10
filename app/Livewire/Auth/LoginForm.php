<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class LoginForm extends Component
{
    public string $email = '';
    public string $password = '';
    public bool $remember = false;

    protected function rules(): array
    {
        return [
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ];
    }

    public function login()
    {
        $credentials = $this->validate();

        if (Auth::attempt(
            ['email' => strtolower($credentials['email']), 'password' => $credentials['password']],
            $this->remember
        )) {
            session()->regenerate();
            return redirect()->intended(route('dashboard'));
        }

        $this->addError('email', 'E-mail ou senha inválidos.');
    }

    public function render()
    {
        return view('livewire.auth.login-form');
    }
}
