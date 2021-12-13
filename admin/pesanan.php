

<!doctype html>
<html class="no-js" lang="en">

<head>
    <title>Kelola Pesanan</title>
    <?php require '_headtags.php' ?>
    <?php loginAdmin() ?>
</head>

<body>
    <div class="page-container">
        
        <?php require '_sidebar.php' ?>
        <!-- main content area start -->
        <div class="main-content">
            
        
            <?php require '_header.php' ?>
            
            
            <!-- page title area end -->
            <div class="main-content-inner">
               
                <!-- market value area start -->
                <div class="row mt-5 mb-5">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-center">
									<h2>Daftar Product</h2>
                                </div>
                                    <div class="data-tables datatable-dark">
										 <table id="dataTable3" class="display" style="width:100%"><thead class="thead-dark">
											<tr>
												<th>No.</th>
												<th>Nama User</th>
												<th>Produk</th>
												<th>Total Harga</th>
												<th>Status</th>
											</tr></thead><tbody>
											<?php 
											$user = mysqli_query($conn,"SELECT * from tb_admin");
											$no=1;
											foreach($user as $p){

												?>
												<?php if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_cart WHERE id_user=".$p['admin_id']." AND status = 1")) != 0) : ?>
												<tr>
													<td><?php echo $no++ ?></td>
													<td><?= $p['admin_name'] ?></td>
													<td><?php 
														$produk = mysqli_query($conn, "SELECT * FROM tb_cart WHERE id_user=".$p['admin_id']." AND status = 1");

                            $text = "";
                            $totalReal =0;
                            foreach ($produk as $pr){
                              $a = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_id = ".$pr['id_product']);
                              $a = mysqli_fetch_assoc($a);

                              $productName = $a['product_name'];
                              $total = $pr['total'];
                              $productPrice = $a['product_price'];
                              $productPrice2 = number_format($productPrice);

                              $totalReal += $productPrice * $total;

                              $text .= "<br>$productName (Rp. $productPrice2 x $total)";
                            }

                            echo $text
                            
													?></td>
													<td><?php echo number_format($totalReal) ?></td>
													<td>
                            <a href="done.php?id=<?= $p['admin_id'] ?>" onclick="return confirm('Apakah anda yakin?')">Tandai Selesai</a>
                          </td>
												</tr>		
												
												<?php 
                        endif;
											}
											
											?>
										</tbody>
										</table>
                                    </div>
								 </div>
                            </div>
                        </div>
                    </div>
                </div>
              
                
                <!-- row area start-->
            </div>
        </div>
        <!-- main content area end -->
        <!-- footer area start-->
        <footer>
            <div class="footer-area">
                <p></p>
            </div>
        </footer>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->
	
	
	<script>
	$(document).ready(function() {
    $('#dataTable3').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'print'
        ]
    } );
	} );
	</script>
	
	<?php require '_footer.php' ?>
</body>
</html>