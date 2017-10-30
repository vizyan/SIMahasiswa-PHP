<?php
// Initialize the session
session_start();

// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: welcome.php");
  exit;
}

?><!DOCTYPE html>
<html lang="en">
  <head>
    <title>Praktikum SBD Modul 4</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/custom.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script type='javascript' src="assets/js/bootstrap.min.js"></script>
  </head>

  <body style="background-color : #fafafa;">
    <br><br>
    <header class="main-header">
      <center><h1 class="blogtitle">CRUD Sederhana dengan PHP dan MYSQL</h1></center>
      <center><h4 class="blogtitle">Praktikum Sistem Basis Data 2017</h4></center>
    </header><br><br>

    <!-- Membuat navbar di sebelah kiri halaman -->
    <div class="col-md-2" align="left">
      <ul class="nav" id="mainmenu">
        <br>
        <li>
          <a href="mahasiswa.php"><i class="fa fa-user fa2x"></i>Mahasiswa</a>
        </li>
        <li>
          <a class="activemenu" href="dosen.php"><i class="fa fa-user fa2x"></i>Dosen</a>
        </li>
        <li>
          <a  href="logout.php"><i class="glyphicon glyphicon-log-out"></i>Logout</a>
        </li>
      </ul>
    </div>
    <div class= "container col-md-10">
      <p><a href='tambah_dosen.php'>
        <button type='button' class='btn btn-primary'>
        <span class='glyphicon glyphicon-plus-sign'></span> Add Dosen</button></a>
      </p>
      <div class="row">
        <div class="col-md-12">
          <table class="table table-striped table-bordered">
            <thead>
              <!-- Judul kolom -->
              <tr>
                <th>NIDN</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Email</th>
                <th>Opsi</th>
              </tr>
            </thead>
            <tbody>
              <!-- fungsi select pada php taruh disini-->
              <?php
               include "koneksi.php";

               $query = "SELECT * FROM Dosen";
               $result = mysqli_query($connect, $query) or die(mysqli_error($connect));
               while ($row = mysqli_fetch_array($result)) {
                 ?>

                 <tr>
                   <td><?php echo $row['nidn']; ?></td>
                   <td><?php echo $row['nama']; ?></td>
                   <td><?php echo $row['alamat']; ?></td>
                   <td><?php echo $row['email']; ?></td>
                   <td>
                     <a href="edit_dosen.php?id=<?php echo $row['id_dosen']; ?>" class="btn btn-success">
                     <span class="glyphicon glyphicon-edit"></span> Edit </button></a>
                     <a href="hapus_dosen.php?id=<?php echo $row['id_dosen']; ?>" class="btn btn-danger">
                     <span class="glyphicon glyphicon-remove-sign"> Delete </button></a>
                  </td>
                </tr>

                <?php
               }
               ?>

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </body>
</html>
