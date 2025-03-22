<?php

use Core\App;
use Core\Validator;
use Validators\AuthForm;

$email = cleanStringInput($_POST["email"] ?? "");
$password = cleanStringInput($_POST["password"] ?? "");
$form = new AuthForm();

if(! $form->validate($email, $password)) {
    view("registration/create.php", [
        "title" => "Create An Account",
        "errors" => $form->errors(),
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