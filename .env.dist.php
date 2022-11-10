<?php

if (!function_exists('env')) {
    function env(string $key, mixed $fallback = '')
    {
        $value = getenv($key);

        if (!$value) {
            $value = $_ENV[$key] ?? false;

            if (!$value) {
                return $fallback;
            }
        }

        return $value;
    }
}
