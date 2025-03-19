<?php

$notes = $connection->fetchAll("SELECT * FROM notes WHERE user_id = :user_id", ["user_id" => 1]);

view("notes/index.php", [
    "title" => "All Your Notes",
    "notes" => $notes,
]);
