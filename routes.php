<?php

$router->get("/", "index.php");

$router->get("/notes", "notes/index.php");
$router->post("/notes", "notes/store.php");
$router->delete("/notes", "notes/delete.php");
$router->put("/notes", "notes/update.php");
$router->get("/notes/create", "notes/create.php");
$router->get("/notes/edit", "notes/edit.php");
$router->get("/notes/show", "notes/show.php");

$router->get("/register", "registration/create.php");
$router->post("/register", "registration/store.php");
