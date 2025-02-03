<?php

namespace App\Http\Requests\Auth;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'login' => ['required', 'string'],
            'password' => ['required', 'string'],
        ];
    }

    public function authenticate(): void
    {
        $this->ensureIsNotRateLimited();

        $login = $this->input('login');
        $credentials = [];

        // Log de début d'authentification
        Log::info('Tentative de connexion', [
            'login' => $login,
            'credentials_present' => [
                'login_exists' => !empty($login),
                'password_exists' => !empty($this->password)
            ]
        ]);

        // Détermine si c'est un email ou un numéro de téléphone
        if (filter_var($login, FILTER_VALIDATE_EMAIL)) {
            $credentials['email'] = $login;
        } else {
            $credentials['phone'] = $login;
        }

        $credentials['password'] = $this->input('password');
        $remember = $this->boolean('remember');

        if (!Auth::attempt($credentials, $remember)) {
            Log::error('Échec de l\'authentification', [
                'login' => $login,
                'user_exists' => \App\Models\User::where('email', $login)
                    ->orWhere('phone', $login)
                    ->exists()
            ]);

            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'login' => trans('auth.failed'),
            ]);
        }

        Log::info('Authentification réussie', [
            'user_id' => Auth::id(),
            'login' => $login
        ]);

        RateLimiter::clear($this->throttleKey());
    }

    public function ensureIsNotRateLimited(): void
    {
        if (!RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'login' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    public function throttleKey(): string
    {
        // Utilise le login au lieu de l'email pour la limitation de tentatives
        return Str::transliterate(Str::lower($this->input('login')).'|'.$this->ip());
    }
}
