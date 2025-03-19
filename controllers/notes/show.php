<?php

$noteID = cleanIntegerInput($_GET["id"] ?? "0");
$note = $connection->fetch("SELECT * FROM notes WHERE id = :note_id", ["note_id" => $noteID]);

//For now we just use user id 1
if($note["user_id"] != 1) abort(403, "You are not allowed to view this note.");

view("notes/show.php", [
    "title" => "Your Note ({$note['id']})",
    "note" => $note,
]);