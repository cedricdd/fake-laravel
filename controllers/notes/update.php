<?php

use Core\App;
use Validators\NoteForm;

$noteID = cleanIntegerInput($_POST["id"] ?? "0");

$db = App::resolve("Core\Database");
$note = $db->findOrFail("SELECT * FROM notes WHERE id = :note_id", ["note_id" => $noteID]);

//For now we just use user id 1
if($note["user_id"] != 1) abort(403, "You are not allowed to edit this note.");

$body = cleanStringInput($_POST["body"] ?? "");
$form = new NoteForm();

if(! $form->validate($body)) {
    view("notes/edit.php", [
        "title" => "Your Note ($noteID)",
        "errors" => $form->errors(),
        "note" => $note,
    ]);

    exit();
}

$db->execute("UPDATE notes SET body = :body WHERE id = :note_id", ["note_id" => $noteID, "body" => $body]);

header("location: /notes/show?id=" . $noteID);

