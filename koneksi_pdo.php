<?php
  $host = "localhost";
  $username   = "root";
  $password   = "";
  $dbname     = "modul4";

  try{
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Berhasil koneksi ke database";
  } catch (PDOException $e){
    echo "Koneksi error: " . $e->getMessage();
  } 

?>
