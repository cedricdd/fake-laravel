<?php

use Core\App;
use Core\Validator;

$email = cleanStringInput($_POST["email"] ?? "");
$password = cleanStringInput($_POST["password"] ?? "");
$errors = [];

if(! Validator::email($email)) {
    $errors["email"] = "Please enter a valid email address.";
}

if(! Validator::string($password)) {
    $errors["password"] = "Please enter a valid password.";
}

if(!empty($errors)) {
    view("session/create.php", [
        "title" => "Log Into The Note App",
        "errors" => $errors,
    ]);

    exit();
}

$db = App::resolve("Core\Database");

$user = $db->find("SELECT id, password FROM users WHERE email = :email", ["email" => $email]);

//The user exists and it's the right password
if($user != false && password_verify($password, $user["password"])) {
    session_regenerate_id();
    $_SESSION["user"] = [
        "id" => $db->getColumn("SELECT LAST_INSERT_ID();"),
        "email" => $email,
    ];

    header("location: /");
    exit();
}

$errors["password"] = "No matching account found for that email and password.";

if(!empty($errors)) {
    view("session/create.php", [
        "title" => "Log Into The Note App",
        "errors" => $errors,
    ]);

    exit();
}