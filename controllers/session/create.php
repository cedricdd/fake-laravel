<?php

use Core\Session;

view("session/create.php", [
    "title" => "Log Into The Note App",
    "errors" => Session::getFlash("errors"),
    "old" => Session::getFlash("old"),
]);