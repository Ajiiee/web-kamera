<!DOCTYPE html>
<html lang="en">
<head>
    <title>FJ Cam</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/footer.css">
    <?php
    require '_headtags.php';
    ?>
    <style type="text/css">
        </style>
    
    
</head>
<body>
    <!--Header-->
    <?php require '_header-dsb.php' ?>
<div class="slideshow-container">



</div>
<br>


<br>
<center>
    <h1><u class="spelling-error">PRODUK TERLARIS</u></h1> <br>
  </center>
  <?php
$products = mysqli_query($conn, "SELECT * FROM tb_product ORDER BY product_id DESC LIMIT 1");
foreach ($products as $product) :
?>
  <div class="card">
    <img src="admin/product/<?= $product['product_image'] ?>" style="width:100%">
    <h1><?= $product['product_name'] ?></h1><br>
    <p class="price">Rp. <?= number_format($product['product_price']) ?></p><br>
    <p><?= $product['product_description'] ?></p><br>
    <form action="login.php" method="post">
        <?php $idUser = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tb_admin"))["admin_id"] ?>
        <input type="hidden" name="userID" value="<?= $idUser ?>">
        <input type="hidden" name="productID" value="<?= $product['product_id'] ?>">
        <p><button type="submit" name="addToCart" class="buy-1" onclick="return confirm('SIlahkan Login Terlebih Dahulu')">Masukan ke keranjang</button></p>
    </form>
  </div>
<?php endforeach; ?>
</div>
<script>
  var slideIndex = 0;
  showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 3000); // Change image every 2 seconds
}
</script> <br> <br> 
<footer class="footer">
      <div class="container">
        <p class="text-muted">Copyright &copy; 2021 By FJ </p>       
      </div>
    </footer>
</body>
</html>