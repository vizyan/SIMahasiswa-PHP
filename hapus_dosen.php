<?php
  include "koneksi.php";
  $id = $_GET['id'];

  $query = mysqli_query($connect, "DELETE FROM dosen WHERE id_dosen='$id'")
  or die(mysqli_error($connect));

  if($query){
    header('location:dosen.php');
  } else {
    echo mysqli_error($connect);
  }

 ?>
