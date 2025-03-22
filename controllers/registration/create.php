<?php

use Core\Session;

view("registration/create.php", [
    "title" => "Create An Account",
    "errors" => Session::getFlash("errors"),
    "old" => Session::getFlash("old"),
]);