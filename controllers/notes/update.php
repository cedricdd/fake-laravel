<?php

use Core\App;

$noteID = cleanIntegerInput($_POST["id"] ?? "0");

$db = App::resolve("Core\Database");
$note = $db->findOrFail("SELECT * FROM notes WHERE id = :note_id", ["note_id" => $noteID]);

//For now we just use user id 1
if($note["user_id"] != 1) abort(403, "You are not allowed to edit this note.");

$errors = [];
$body = cleanStringInput($_POST["body"] ?? "");

if(Core\Validator::string($body, 1, 1000) == false) {
    $errors['body'] = "A body of no more than 1.000 characters is required! (Currently " . strlen($body) . " characters)";
} 

//All good edit the note
if(empty($errors)) {
    $db->execute("UPDATE notes SET body = :body WHERE id = :note_id", ["note_id" => $noteID, "body" => $body]);

    header("location: /notes/show?id=" . $noteID);
}

view("notes/edit.php", [
    "title" => "Your Note ($noteID)",
    "errors" => $errors,
    "note" => $note,
]);

