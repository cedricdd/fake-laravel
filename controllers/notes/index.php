<?php

use Core\App;

$db = App::resolve("Core\Database");
$notes = $db->findAll("SELECT * FROM notes WHERE user_id = :user_id", ["user_id" => $_SESSION["user"]["id"]]);

view("notes/index.php", [
    "title" => "All Your Notes",
    "notes" => $notes,
]);
