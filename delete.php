<?php

require "database.php";

$id = $_GET["id"];

$conn->prepare("DELETE FROM abm WHERE id = :id")->execute([":id" => "$id"]);

header("Location: index.php");
