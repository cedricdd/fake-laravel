<?php

$router->get("/", "index.php");

$router->get("/notes", "notes/index.php");
$router->post("/notes", "notes/store.php");
$router->get("/notes/create", "notes/create.php");
$router->delete("/notes", "notes/delete.php");
$router->get("/notes/show", "notes/show.php");
$router->get("/notes/edit", "notes/edit.php");
$router->put("/notes", "notes/update.php");