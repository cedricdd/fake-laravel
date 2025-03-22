<?php

function abort(int $statusCode = 404, string $message = "You are not allowed to see this page.") {
    http_response_code($statusCode);

    exit($message);
}

function view(string $path, array $attributes = []) {
    extract($attributes);

    require BASE_PATH . "/views/" . $path;
}

function cleanIntegerInput(string $input): int {
    return intval($input);
}

function cleanStringInput(string $input): string {
    return trim(htmlspecialchars($input));
}

function redirect(string $path) {
    header("location: " . $path);
    exit();
}