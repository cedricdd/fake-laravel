<?php

namespace Core;

abstract class Session
{
    protected const SESSION_NAME = "note_session";
    protected const FLASH_NAME = "_flash";

    public static function set(string $key, mixed $value): void
    {
        $_SESSION[$key] = $value;
    }
    public static function setFlash(string $key, mixed $value): void
    {
        $_SESSION[static::FLASH_NAME][$key] = $value;
    }

    public static function get(string $key, mixed $default = null): mixed
    {
        return $_SESSION[$key] ?? $default;
    }

    public static function getFlash(string $key, mixed $default = null): mixed
    {
        $value = $_SESSION[static::FLASH_NAME][$key] ?? $default;

        Session::removeFlash($key);

        return $value;
    }

    public static function has(string $key): bool
    {
        return isset($_SESSION[$key]);
    }

    public static function remove(string $key): void
    {
        unset($_SESSION[$key]);
    }

    public static function removeFlash(string $key): void
    {
        unset($_SESSION[static::FLASH_NAME][$key]);
    }

    public static function start(): void
    {
        ini_set('session.name', static::SESSION_NAME);
        ini_set('session.cookie_httponly', 1);
        ini_set('session.cookie_secure', '1');
        session_start();
    }

    public static function destroy(): void
    {
        $_SESSION = [];
        session_destroy();

        $info = session_get_cookie_params();
        setcookie(static::SESSION_NAME, "", time() - 3600, $info["path"], $info["domain"]);
    }
}