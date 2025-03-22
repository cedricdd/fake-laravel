<?php

use Core\App;
use Core\Session;

$noteID = cleanIntegerInput($_GET["id"] ?? "0");

$db = App::resolve("Core\Database");
$note = $db->findOrFail("SELECT * FROM notes WHERE id = :note_id", ["note_id" => $noteID]);

if($note["user_id"] != $_SESSION["user"]["id"]) {
    abort(403, "You are not allowed to edit this note.");
}

view("notes/edit.php", [
    "title" => "Your Note ({$note['id']})",
    "note" => $note,
    "errors" => Session::getFlash("errors"),
    "old" => Session::getFlash("old"),
]);