<?php

use Core\App;
use Validators\LoginForm;

$email = cleanStringInput($_POST["email"] ?? "");
$password = cleanStringInput($_POST["password"] ?? "");
$form = new LoginForm();

if ($form->validate($email, $password)) {

    $db = App::resolve("Core\Database");

    $user = $db->find("SELECT id, password FROM users WHERE email = :email", ["email" => $email]);

    //The user exists and it's the right password
    if ($user != false && password_verify($password, $user["password"])) {
        session_regenerate_id();
        $_SESSION["user"] = [
            "id" => $db->getColumn("SELECT LAST_INSERT_ID();"),
            "email" => $email,
        ];

        redirect("/");
    }
    
    $form->error("password", "No matching account found for that email and password.");
}

view("session/create.php", [
    "title" => "Log Into The Note App",
    "errors" => $form->errors(),
]);