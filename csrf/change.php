<?php
session_start();

if (!isset($_SESSION["user"]) || empty($_SESSION["user"])) {
    die("Not allowed");
}

$newusername = filter_input(INPUT_POST, "newusername", FILTER_SANITIZE_STRING);
$checked = filter_input(INPUT_POST, "agb", FILTER_SANITIZE_NUMBER_INT);

if (empty($checked) || !$checked) {
    die("You need to know this is important.");
}

if (!empty($newusername)) {
    $id = $_SESSION["user"]["id"];

    $db = new mysqli("localhost", "csa2", "lnLqtf02I8qZoYlS", "csa2");
    $db->set_charset("utf8mb4");

    $stmt = $db->prepare("UPDATE user SET username = ? WHERE id = ?");
    $stmt->bind_param("si", $newusername, $id);
    if (!$stmt->execute()) {
        die("Something wrong");
    }

    $_SESSION["user"]["username"] = $newusername;
} else {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>CSA2Example - SQL Injection</title>
        <style type="text/css">
            input, body, p {
                font-size: 32px;
            }
        </style>
    </head>
    <body>

    <h1>
        Your username has been changed to: <?= $newusername ?>
    </h1>
    <a href="login.php">Go back</a>

    </body>
</html>