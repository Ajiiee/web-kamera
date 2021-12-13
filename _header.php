<header>
  <div class="container">
  <h1><a href="dashboard.php">Fj Cam Store</a></h1>
  <ul>
      <li><a href="dashboard.php">Home</a></li>
      <?php if($_SESSION["login-kamera"] == "admin") : ?>
        <li><a href="admin">Dashboard Admin</a></li>
      <?php else : ?>
        <li><a href="produk.php">Produk</a></li>
        <li><a href="cart.php">Keranjang saya</a></li>
      <?php endif ;?>
      <li><a href="logout.php">Keluar</a></li>
      
  </ul>
  </div>
</header>