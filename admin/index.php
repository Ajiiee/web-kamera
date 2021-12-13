<!doctype html>
<html lang="en">
<head>
  <title>Admin Panel FJ CAM</title>
  <?php require '_headtags.php' ?>
  <?php loginAdmin() ?>
</head>

<body>
  <div id="preloader">
    <div class="loader"></div>
  </div>
  <!-- preloader area end -->
  <!-- page container area start -->
  <div class="page-container">
    
    <?php require '_sidebar.php' ?>

    <!-- main content area start -->
    <div class="main-content">
      
    
      <?php require '_header.php' ?>
            
                <div class="row mt-5 mb-5">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-center">
									<h2>Selamat Datang</h2>
                                </div>
                                <div class="market-status-table mt-4">
                                    Anda masuk sebagai <strong><?php echo $_SESSION['login-kamera'] ?></strong>
									<br>
									<p>Pada halaman admin, Anda dapat menambah kategori produk, mengelola produk, 
									mengelola user dan admin, melihat konfirmasi pembayaran</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              
                
                
            </div>
        </div>
        
		
		
		
        <!-- footer area start-->
        <footer>
            <div class="footer-area">
                <p>fj cam</p>
            </div>
        </footer>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->

    <?php require '_footer.php' ?>
</body>

</html>
