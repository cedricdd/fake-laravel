<?php

use Core\Session;

view("notes/create.php", [
    "title" => "Create A New Note",
    "errors" => Session::getFlash("errors"),
    "old" => Session::getFlash("old"),
]);