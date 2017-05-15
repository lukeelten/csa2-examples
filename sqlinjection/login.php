<?php
$db = new mysqli("localhost", "csa2", "lnLqtf02I8qZoYlS", "csa2");
$db->set_charset("utf8mb4");

$username = $_POST["username"];
$password = hash("sha256", $_POST["password"]);

$sql = "SELECT * FROM user WHERE username = '" . $username . "' AND password='" . $password . "'";

$result = $db->query($sql);
$user = ($result) ? $result->fetch_array() : false;

if (!$result || !$user) {
    die("Wrong password");
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

<h1>Hello <?= $user["username"] ?></h1>
<p>
    This page contains very sensitive information.
</p>

</body>
</html>
