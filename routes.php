<?php

$router->get("/", "index.php");

$router->get("/notes", "notes/index.php")->only("auth");
$router->post("/notes", "notes/store.php")->only("auth");
$router->delete("/notes", "notes/destroy.php")->only("auth");
$router->put("/notes", "notes/update.php")->only("auth");
$router->get("/notes/create", "notes/create.php")->only("auth");
$router->get("/notes/edit", "notes/edit.php")->only("auth");
$router->get("/notes/show", "notes/show.php")->only("auth");

$router->get("/register", "registration/create.php")->only("guest");
$router->post("/register", "registration/store.php")->only("guest");

$router->get("/login", "session/create.php")->only("guest");
$router->post("/login", "session/store.php")->only("guest");
$router->delete("/logout", "session/destroy.php")->only("auth");
