<?php

use Core\App;
use Validators\LoginForm;

$email = cleanStringInput($_POST["email"] ?? "");
$password = cleanStringInput($_POST["password"] ?? "");
$form = new LoginForm()->validate(compact("email", "password"));

$db = App::resolve("Core\Database");

$user = $db->find("SELECT id, password FROM users WHERE email = :email", ["email" => $email]);

if ($user == false || password_verify($password, $user["password"]) == false) {
    $form->error("password", "No matching account found for that email and password.")->throwError();
}

//The user exists and it's the right password
session_regenerate_id();
$_SESSION["user"] = [
    "id" => $db->getColumn("SELECT LAST_INSERT_ID();"),
    "email" => $email,
];

redirect("/");