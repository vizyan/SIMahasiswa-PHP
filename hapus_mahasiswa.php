<?php
  include "koneksi.php";
  $id=$_GET['id'];

  $query = mysqli_query($connect, "DELETE FROM mahasiswa WHERE id='$id'")
  or die(mysqli_error($connect));

  if($query){
    header('location:mahasiswa.php');
  } else {
    echo mysqli_error($connect);
  }

?>
