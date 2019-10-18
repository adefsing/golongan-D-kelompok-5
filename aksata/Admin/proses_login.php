<?php 
if(isset($_POST['submit'])){
    include 'koneksi.php';
    error_reporting(0);
    $username = $_POST['username'];
        $password = $_POST['password'];
        $login    = mysqli_query($connect, "select * from login where username='$username' and passwd='$password'");
        $result   = mysqli_num_rows($login);
        if($result>0){
            $user = mysqli_fetch_array($login);
            session_start();
            $_SESSION['username'] = $user['username'];
            header("location:quixlab-master/index.html");
        }else{
            echo "<script>alert('Username dan Password yang anda masukkan salah Silahkan masukkan kembali');document.location.href='login.php'</script>\n";
        }
    }


?>