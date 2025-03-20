<?php

use Core\App;

$errors = [];
$body = cleanStringInput($_POST["body"] ?? "");

if(Core\Validator::string($body, 1, 1000) == false) {
    $errors['body'] = "A body of no more than 1.000 characters is required! (Currently " . strlen($body) . " characters)";
} 

//All good insert the note
if(empty($errors)) {
    $db = App::resolve("Core\Database");
    $db->execute("INSERT INTO notes(body, user_id) VALUES(:body, 1);", ["body" => $body]);

    header("location: /notes");
}

view("notes/create.php", [
    "title" => "Create A New Note",
    "errors" => $errors,
]);