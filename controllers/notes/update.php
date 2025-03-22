<?php

use Core\App;
use Validators\NoteForm;

$noteID = cleanIntegerInput($_POST["id"] ?? "0");

$db = App::resolve("Core\Database");
$note = $db->findOrFail("SELECT * FROM notes WHERE id = :note_id", ["note_id" => $noteID]);

if ($note["user_id"] != $_SESSION["user"]["id"])
    abort(403, "You are not allowed to edit this note.");

$body = cleanStringInput($_POST["body"] ?? "");

new NoteForm()->validate(compact("body"));

$db->execute("UPDATE notes SET body = :body WHERE id = :note_id", ["note_id" => $noteID, "body" => $body]);

redirect("/notes/show?id=" . $noteID);