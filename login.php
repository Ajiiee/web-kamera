<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
  <?php
  require '_headtags.php';
  loginCheck();
  ?>
</head>
<body id="bg-login">
  <div class="box-login">
    <h2>FJ Cam Store</h2>
    <form action="" method="POST">
      <input type="text" name="user" placeholder="Username" class="input-control">
      <input type="password" name="pass" placeholder="Password" class="input-control">
      <input type="submit" name="submit" value="Login" class="btn"><br> <br>
      <p>Belum mempunyai akun? <u><a href="register.php"><br>Daftar!</a></u></p>
    </form>
  </div>
</body>
</html>


<?php
  if(isset($_POST['submit'])){

    $user = $_POST['user'];
    $pass = $_POST['pass'];

    $cek = mysqli_query($conn, "SELECT * FROM tb_admin WHERE username = '$user'");

    // cek user
    if(mysqli_num_rows($cek) == 0){
      echo "<script>
              alert('Username tidak terdaftar')
              window.location.href = 'login.php'
            </script>";
    } else {
      $userDB = mysqli_fetch_assoc($cek);

      // cek password
      if(password_verify($pass, $userDB['password'])){
        $_SESSION['login-kamera'] = $userDB["username"];

        if($_SESSION["login-kamera"] == "admin"){
          header("Location: admin/");
        }else {
          header("Location: dashboard.php");
        }
      } else {
        echo "<script>
                alert('Password salah!')
                window.location.href = 'login.php'
              </script>";
      }
    }
  }
?>