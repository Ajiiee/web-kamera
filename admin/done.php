<?php

require '_headtags.php';

loginAdmin();

$id = $_GET["id"];

mysqli_query($conn, "DELETE FROM tb_cart WHERE id_user = $id");

if(mysqli_affected_rows($conn) > 0){
  echo "<script>
          alert('Berhasil menyelesaikan pesanan')
          window.location.href = 'pesanan.php'
        </script>";
}else {
  echo "<script>
          alert('". mysqli_error($conn) ."')
          window.location.href = 'pesanan.php'
        </script>";
}