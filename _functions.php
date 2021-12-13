<?php

function loginCheck() {
  if(isset($_SESSION["login-kamera"])){
    echo "<script>
            alert('Anda sudah login!')
            window.location.href = 'index.php'
          </script>";
  }
}

function notLoginCheck() {
  if(!isset($_SESSION["login-kamera"])){
    echo "<script>
            alert('Anda belum login!')
            window.location.href = 'login.php'
          </script>";
  }
}

function loginAdmin(){
  if(!isset($_SESSION["login-kamera"]) || $_SESSION["login-kamera"] != "admin"){
    echo "<script>
            alert('Akses ditolak, anda bukan admin!')
            window.location.href = '../index.php'
          </script>";
  }
}

function loginUser(){
  if(!isset($_SESSION["login-kamera"]) || $_SESSION["login-kamera"] == "admin"){
    echo "<script>
            alert('Akses ditolak!')
            window.location.href = 'index.php'
          </script>";
  }
}