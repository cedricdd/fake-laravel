<?php

use Core\App;

$noteID = cleanIntegerInput($_GET["id"] ?? "0");

$db = App::resolve("Core\Database");
$note = $db->findOrFail("SELECT * FROM notes WHERE id = :note_id", ["note_id" => $noteID]);

//For now we just use user id 1
if($note["user_id"] != 1) abort(403, "You are not allowed to edit this note.");

view("notes/edit.php", [
    "title" => "Your Note ({$note['id']})",
    "note" => $note,
]);