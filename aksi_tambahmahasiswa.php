<?php
  include "koneksi_pdo.php";

  $nim = $_POST['nim'];
  $nama = $_POST['nama'];
  $alamat = $_POST['alamat'];
  $jk = $_POST['jk'];
  $doswal = $_POST['doswal'];

  //insert secara prosedural
  // $query = mysqli_query($connect, "insert into mahasiswa (nim, nama, alamat, jeniskelamin, id_dosen)
              //values ('$nim', '$nama', '$alamat', '$jk', '$doswal')");

 // if ($query) {
 //      header('location:mahasiswa.php');
 //    } else {
 //      echo mysqli_error();
 //    }

 // untuk insert dengan pdo
 try{
   // Database connection
   $query = $conn->prepare("INSERT INTO mahasiswa (nim, nama, alamat, jeniskelamin, id_dosen)
                            VALUES (:nim,:nama,:alamat,:jk,:doswal)");

   $query->bindParam(":nim", $nim);
   $query->bindParam(":nama", $nama);
   $query->bindParam(":alamat", $alamat);
   $query->bindParam(":jk", $jk);
   $query->bindParam(":doswal", $doswal);
   // Jalankan perintah SQL
   $query->execute();
   header('location:mahasiswa.php');
} catch(PDOException $pe){
  // Throw exception
   echo 'Koneksi error: '.$pe->getMessage(); } 


?>
