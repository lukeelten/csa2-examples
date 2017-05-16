<?php
session_start();

$db = new mysqli("localhost", "csa2", "lnLqtf02I8qZoYlS", "csa2");
$db->set_charset("utf8mb4");

if (!isset($_SESSION["user"]) || empty($_SESSION["user"])) {
    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);
    $password = hash("sha256", $password);

    $stmt = $db->prepare("SELECT * FROM user WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();

    $result = $stmt->get_result();
    $user = ($result) ? $result->fetch_array() : false;

    if (!$result || !$user) {
        die("Wrong password");
    }

    $_SESSION["user"] = $user;
} else {
    $stmt = $db->prepare("SELECT * FROM user WHERE id = ?");
    $stmt->bind_param("i", $_SESSION["user"]["id"]);
    $stmt->execute();

    $result = $stmt->get_result();
    $user = ($result) ? $result->fetch_array() : false;

    if (!$result || !$user) {
        die("Something wrong");
    }

    $_SESSION["user"] = $user;
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

<h1>Hello <?= $_SESSION["user"]["username"] ?>, </h1>
<hr>
<div>
    <h3>Change your username:</h3>
    <form method="post" action="change.php">
        <input type="text" name="newusername" placeholder="New Username" required> <br />
        <input type="checkbox" name="agb" value="1"> Yes I know this is somehow important. <br/>
        <br />
        <input type="submit" value="Change username" />
    </form>
</div>


</body>
</html>
