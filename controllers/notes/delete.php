<?php

$noteID = cleanIntegerInput($_POST["id"] ?? "0");
$note = $connection->fetch("SELECT * FROM notes WHERE id = :note_id", ["note_id" => $noteID]);

//For now we just use user id 1
if($note["user_id"] != 1) abort(403, "You are not allowed to remove this note.");

$connection->execute("DELETE FROM notes WHERE id = :note_id", ["note_id" => $noteID]);

header("location: /notes");