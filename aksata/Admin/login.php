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
<?php 
include 'koneksi.php';
if(isset($_POST['submit'])){
    include 'koneksi.php';
    error_reporting(0);
    $username = $_POST['username'];
        $password = $_POST['password'];
        $login    = mysqli_query($connect, "select * from pegawai where username='$username' and password='$password'");
        $result   = mysqli_num_rows($login);
        if($result>0){
            $user = mysqli_fetch_array($login);
            session_start();
            $_SESSION['username'] = $user['username'];
            header("location:quixlab-master/index.html");
        }else{
            echo "<script>alert('Username dan Password yang anda masukkan salah Silahkan masukkan kembali');document.location.href='index.php'</script>\n";
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
                <input type="text" id="name" name="username" placeholder="username">
                <input type="password" name="password" id="password" placeholder="*******">
<<<<<<< HEAD
                <p><button type="submit" formmethod="POST" name="submit" formaction="#">Login</button></p>
=======
                <p><button type="submit" formmethod="POST" formaction="#" name="login">Login</button></p>
>>>>>>> f8fd7febcc2182b16e38437463de1ed82fe60b89
            </form>
        </div>
    </div>
</body>

</html>