<?php

declare(strict_types=1);

namespace App\Auth\Passwords;

use Closure;
use Illuminate\Auth\Passwords\PasswordBrokerManager;
use Illuminate\Support\Str;

class PasswordManager extends PasswordBrokerManager
{
// ...
    protected function createTokenRepository(array $config)
    {
        $key = $this->app['config']['app.key'];
        if (Str::startsWith($key, 'base64:')) {
            $key = base64_decode(substr($key, 7));
        }
        $connection = $config['connection'] ?? null;
        // ①
        return new CustomTokenRepository(
            $this->app['db']->connection($connection),
            $this->app['hash'],
            $config['table'],
            $key,
            $config['expire']
        );
    }

    public function sendResetLink(array $credentials, Closure $callback = null)
    {
        // TODO: Implement sendResetLink() method.
    }

    public function reset(array $credentials, Closure $callback)
    {
        // TODO: Implement reset() method.
    }

    public function validator(Closure $callback)
    {
        // TODO: Implement validator() method.
    }

    public function validateNewPassword(array $credentials)
    {
        // TODO: Implement validateNewPassword() method.
    }
}
