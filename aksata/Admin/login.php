<?php 

    require 'function.php';

    if(isset($_POST["login"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $result = mysqli_query(conn, "SELECT * from login where username ='$username' ")

    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>AKSATA | LOGIN</title>
</head>

<body>
    <div class="content">
        <div class="logo">

                <p id="n">Aksata</p>
                <p id="c">&copy;</p>
        
        </div>
        <div class="login">
            <h1>Login</h1>
            <form action="#" method="POST">
                <input type="text" id="name" name="username" placeholder="username">
                <input type="password" name="password" id="password" placeholder="*******">
                <p><button type="submit" formmethod="POST" formaction="#" name="login">Login</button></p>
            </form>
        </div>
    </div>
</body>

</html>