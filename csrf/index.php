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

<form method="post" action="login.php">

    <input type="text" name="username" placeholder="Username"/><br/>
    <input type="password" name="password" placeholder="Password"/> <br/>
    <input type="submit" name="send" value="Login"/>

</form>

</body>
</html>
