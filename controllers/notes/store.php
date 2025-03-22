<?php

use Core\App;
use Validators\NoteForm;

$body = cleanStringInput($_POST["body"] ?? "");
$form = new NoteForm();

if(! $form->validate($body)) {
    view("notes/create.php", [
        "title" => "Create A New Note",
        "errors" => $form->errors(),
    ]);

    exit();
}

$db = App::resolve("Core\Database");
$db->execute("INSERT INTO notes(body, user_id) VALUES(:body, 1);", ["body" => $body]);

header("location: /notes");