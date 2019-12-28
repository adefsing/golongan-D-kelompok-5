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
    <?php
    if (isset($_POST['submit'])) {
        include '../koneksi.php';
        error_reporting(0);
        $username = $_POST['username'];
        $password = $_POST['password'];
        $login    = mysqli_query($connect, "select id_adm,nm_adm,username,password,foto_adm from admin where username='$username' and password='$password'");
        $result   = mysqli_num_rows($login);
        if ($result > 0) {
            $user = mysqli_fetch_array($login);
            session_start();
            $_SESSION['username'] = $user['username'];
            $_SESSION['nm_adm'] = $user['nm_adm'];
            $_SESSION['id_adm'] = $user['id_adm'];
            $_SESSION['foto_adm'] = $user['foto_adm'];
            header("location:quixlab-master/index.php?page=home");
        } else {
            echo "<script>alert('Username dan Password yang anda masukkan salah Silahkan masukkan kembali');document.location.href='login.php'</script>\n";
        }
    }


    ?>

    <div class="content">
        <div class="logo">

            <p id="n">Aksata</p>
            <p id="c">&copy;</p>

        </div>
        <div class="login">
            <h1>Login</h1>
            <form action="#" method="POST">
                <input type="text" id="name" name="username" placeholder="username" oninvalid="this.setCustomValidity('Username Gaboleh Kosong')" required>
                <input type="password" name="password" id="password" placeholder="*******" oninvalid="this.setCustomValidity('Password juga Gaboleh Kosong')" required>
                <p><button type="submit" formmethod="POST" name="submit" formaction="#">Login</button></p>
            </form>
        </div>
    </div>
</body>

</html>