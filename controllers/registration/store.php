<?php

use Core\App;
use Core\Validator;

$email = cleanStringInput($_POST["email"] ?? "");
$password = cleanStringInput($_POST["password"] ?? "");
$errors = [];

if(! Validator::email($email)) {
    $errors["email"] = "Please enter a valid email address";
}

if(! Validator::string($password, 7, 255)) {
    $errors["password"] = "Please enter a valid password [7-255] characters";
}

if(!empty($errors)) {
    view("registration/create.php", [
        "title" => "Create An Account",
        "errors" => $errors,
    ]);

    exit();
}

$db = App::resolve("Core\Database");

$user = $db->find("SELECT id FROM users WHERE email = :email", ["email" => $email]);


if($user != false) {
    header("location /login");
    exit();
}

$db->execute("INSERT INTO users(email, password) VALUES(:email, :password)", ["email" => $email, "password" => password_hash($password, PASSWORD_DEFAULT)]);

$_SESSION["user"] = [
    "id" => $db->getColumn("SELECT LAST_INSERT_ID();"),
    "email" => $email,
];

header("location: /");
exit();