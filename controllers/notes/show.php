<?php

use Core\App;

$noteID = cleanIntegerInput($_GET["id"] ?? "0");

$db = App::resolve("Core\Database");
$note = $db->findOrFail("SELECT * FROM notes WHERE id = :note_id", ["note_id" => $noteID]);

if($note["user_id"] != $_SESSION["user"]["id"])
    abort(403, "You are not allowed to view this note.");

view("notes/show.php", [
    "title" => "Your Note ({$note['id']})",
    "note" => $note,
]);