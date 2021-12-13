<?php
session_start();
session_destroy();
echo "<script type='text/javascript'>
alert('Anda Berhasil Logout');
window.location = 'index.php';
</script>";
?>