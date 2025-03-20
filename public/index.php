<?php

const BASE_PATH = __DIR__ . "/../";

spl_autoload_register(function ($class) {
    require_once BASE_PATH . str_replace("\\", "/", $class) . ".php";
});

require BASE_PATH . "/Core/functions.php";
require BASE_PATH . "bootstrap.php";

$router = new Core\Router();
require BASE_PATH . "/routes.php";

$uri = parse_url($_SERVER["REQUEST_URI"])["path"];
$method = $_POST["_method"] ?? $_SERVER["REQUEST_METHOD"];

$router->route($uri, $method);