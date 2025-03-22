<?php

use Core\App;
use Validators\NoteForm;

$body = cleanStringInput($_POST["body"] ?? "");

new NoteForm()->validate(compact("body"));

$db = App::resolve("Core\Database");
$db->execute("INSERT INTO notes(body, user_id) VALUES(:body, :user_id);", [
    "body" => $body,
    "user_id" => $_SESSION["user"]["id"],
]);

redirect("/notes");