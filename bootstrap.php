<?php

use Core\App;
use Core\Container;
use Core\Database;

$config = require BASE_PATH . "/config.php";

$container = new Container();

App::setContainer($container);
App::bind("Core\Database", function() use ($config) {
    return new Database($config["database"]);
});