<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;
use Illuminate\Session\TokenMismatchException;

class VerifyCsrfToken extends Middleware
{
    /**
     * Les URIs qui doivent être exclues de la vérification CSRF.
     *
     * @var array
     */
    protected $except = [
        // Ajoutez ici les routes à exclure
        'webhook/*',
        'api/*',
        'stripe/*',
        'whatsapp/webhook',
        'twilio/webhook',
    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        try {
            return parent::handle($request, $next);
        } catch (TokenMismatchException $e) {
            if ($request->expectsJson()) {
                return response()->json([
                    'message' => 'Token CSRF invalide. Veuillez rafraîchir la page.',
                    'error' => 'token_mismatch'
                ], 419);
            }

            // Redirection pour les requêtes non-AJAX
            return redirect()->back()
                ->withInput($request->except('password', '_token'))
                ->withErrors([
                    'message' => 'Votre session a expiré. Veuillez réessayer.'
                ]);
        }
    }

    /**
     * Déterminer si la requête doit être exclue de la vérification CSRF.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    protected function inExceptArray($request)
    {
        foreach ($this->except as $except) {
            if ($except !== '/') {
                $except = trim($except, '/');
            }

            if ($request->fullUrlIs($except) || $request->is($except)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Déterminer si la session et l'input CSRF tokens matchent.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    protected function tokensMatch($request)
    {
        $token = $request->input('_token') ?: $request->header('X-CSRF-TOKEN');

        if (!$token && $header = $request->header('X-XSRF-TOKEN')) {
            $token = $this->encrypter->decrypt($header, static::serialized());
        }

        return is_string($request->session()->token()) &&
               is_string($token) &&
               hash_equals($request->session()->token(), $token);
    }
}
