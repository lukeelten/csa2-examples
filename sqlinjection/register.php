<?php

$username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);

if (!empty($username) && !empty($password)) {
    $db = new mysqli("localhost", "csa2", "lnLqtf02I8qZoYlS", "csa2");
    $password = hash("sha256", $password);

    $stmt = $db->prepare("INSERT INTO user (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $password);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        die("Unknown Error");
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>CSA2 Example - SQL Injection</title>
    <style type="text/css">
        input, body, p {
            font-size: 32px;
        }
    </style>
</head>
<body>

<form method="post">

    <input type="text" name="username" placeholder="Username" required><br/>
    <input type="password" name="password" placeholder="Password" required><br/>
    <input type="submit" name="register" value="Register"/>

</form>

</body>
</html>
