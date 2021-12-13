

<!DOCTYPE html>
<html lang="en">
<head>
    <title>FJ CAM</title>
    <?php require '_headtags.php' ?>
    <?php loginUser() ?>
    <style type="text/css">
      body{
      margin: 0;
      font-family:Nunito Sans;
      }
      h3{
      text-align: center;
      font-size: 30px;
      margin: 0;
      padding-top: 10px;
      }
      a{
      text-decoration: none;
      }
      .gallery{
      display: flex;
      flex-wrap: wrap;
      width: 100%;
      justify-content: center;
      align-items: center;
      margin: 50px 0;
      }
      .content{
      width: 24%;
      margin: 15px;
      box-sizing: border-box;
      float: left;
      text-align: center;
      border-radius:10px;
      border-top-right-radius: 10px;
      border-bottom-right-radius: 10px;
      padding-top: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      transition: .4s;
      }
      .content:hover{
      box-shadow: 0 0 11px rgba(33,33,33,.2);
      transform: translate(0px, -5px);
      transition: .6s;
      }
      img{
      width: 200px;
      height: 200px;
      text-align: center;
      margin: 0 auto;
      display: block;
      }
      p{
      text-align: center;
      color: #b2bec3;
      padding: 0 8px;
      }
      h6{
      font-size: 26px;
      text-align: center;
      color: #222f3e;
      margin: 0;
      }
      li{
      padding: 5px;
      }
      .fa{
      color: #ff9f43;
      font-size: 26px;
      transition: .4s;
      }
      .fa:hover{
      transform: scale(1.3);
      transition: .6s;
      }
      button{
      text-align: center;
      font-size: 24px;
      color: #fff;
      width: 100%;
      padding: 15px;
      border:0px;
      outline: none;
      cursor: pointer;
      margin-top: 5px;
      border-bottom-right-radius: 10px;
      border-bottom-left-radius: 10px;
      }
      .buy-1{
      background-color:#F96D00 ;
      }
      .buy-2{
      background-color: #2183a2;
      }
      .buy-3{
      background-color: #2183a2
      }
      @media(max-width: 1000px){
      .content{
      width: 46%;
      }
      }
      @media(max-width: 750px){
      .content{
      width: 100%;
      }
      }
    </style>
</head>
<body>
<?php

if(isset($_POST["addToCart"])){
  $userID = $_POST["userID"];
  $productID = $_POST["productID"];
  
  $cek = mysqli_query($conn, "SELECT * FROM tb_cart WHERE id_product = $productID AND id_user = $userID");
  if(mysqli_num_rows($cek) == 0){
    mysqli_query($conn, "INSERT INTO tb_cart VALUES('',$userID,$productID,1,0)");
  }else {
    $cart = mysqli_fetch_assoc($cek);
    $totalCart = $cart['total'];
    $total = $totalCart+1;

    mysqli_query($conn, "UPDATE tb_cart SET total = $total WHERE id_product = $productID AND id_user = $userID");
  }


  echo "<script>
          alert('Sukses menambah ke keranjang')
          window.location.href = 'cart.php'
        </script>";
}

?>
  <?php require '_header.php' ?>
  <div class="gallery">
    <?php
    $produk = mysqli_query($conn, 'SELECT * FROM tb_product');
    foreach ($produk as $p) :
    ?>
    <div class="content">
      <img src="admin/product/<?= $p['product_image'] ?>">
      <h3><?= $p['product_name'] ?></h3>
      <p><?= $p['product_description'] ?></p>
      <h6>Rp. <?= number_format($p['product_price']) ?></h6>
      <form action="" method="post">
        <?php $idUser = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tb_admin WHERE username = '" . $_SESSION["login-kamera"] . "'"))["admin_id"] ?>
        <input type="hidden" name="userID" value="<?= $idUser ?>">
        <input type="hidden" name="productID" value="<?= $p['product_id'] ?>">
        <button type="submit" name="addToCart" class="buy-1">Masukan ke keranjang</button>
      </form>
    </div>
    <?php endforeach; ?>
  </div>
    <footer class="footer">
      <div class="container">
        <p class="text-muted">Copyright &copy; 2021 By FJ </p>       
      </div>
    </footer>
</body>
</html>

