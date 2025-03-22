<?php

$_SESSION = [];
session_destroy();

$info = session_get_cookie_params();
setcookie("note_session", "", time() - 3600, $info["path"], $info["domain"]);

redirect("/");