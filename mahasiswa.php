<?php
session_start();

if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: welcome.php");
  exit;
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Praktikum SBD Modul 4</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
    <link rel="stylesheet" href="css/style.css" media="screen" type="text/css"/>
    <link href="assets/css/font-awesome.css" rel="stylesheet"/>
    <link href="assets/css/custom.css" rel="stylesheet"/>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11 .3/jquery.min.js"></script>
    <script type='javascript' src="assets/js/bootstrap.min.js"></script>
  </head>

  <body style="background-color : #fafafa;">
    <br><br>
    <header class="main-header">
      <center><h1 class="blogtitle">CRUD Sederhana dengan PHP dan MYSQL</h1></center>
      <center><h4 class="blogtitle">Praktikum Sistem Basis Data 2017</h4></center>
    </header>
    <br><br>

   <!-- Membuat navbar di sebelah kiri halaman -->
   <div class="col-md-2" align="left">
     <ul class="nav" id="mainmenu">
       <br>
       <li>
         <a class="activemenu" href="mahasiswa.php"><i class="fa fa-user fa2x"></i>Mahasiswa</a>
       </li>
       <li>
         <a  href="dosen.php"><i class="fa fa-user fa2x"></i>Dosen</a>
       </li>
       <li>
         <a  href="logout.php"><i class="glyphicon glyphicon-log-out"></i>Logout</a>
       </li>
     </ul>
   </div>
   <div class= "container col-md-10">
     <p><a href='tambah_mahasiswa.php'>
       <button type='button' class='btn btn-primary'>
         <span class='glyphicon glyphicon-plus-sign'>
         </span> Add Mahasiswa</button>
       </a>
     </p>
     <div class="row">
       <div class="col-md-12">
         <table class="table table-striped table-bordered">
           <thead>
             <!-- Judul kolom -->
             <tr>
               <th>NIM</th>
               <th>Nama</th>
               <th>Nama Dosen</th>
               <th>Opsi</th>
             </tr>
           </thead>
           <tbody>

             <?php
             include "koneksi.php";

             $query = 'SELECT m.id, m.nim, m.nama, d.nama AS nama_dosen FROM mahasiswa m INNER JOIN dosen d ON m.id_dosen = d.id_dosen limit 20';
             $result = mysqli_query($connect, $query) or die(mysqli_error($connect));
             while ($row = mysqli_fetch_array($result)){
               ?>

               <tr>
                 <td><?php echo $row['nim']; ?></td>
                 <td><?php echo $row['nama']; ?></td>
                 <td><?php echo $row['nama_dosen']; ?></td>
                 <td>
                   <a href="edit_mahasiswa.php?id=<?php echo $row['id']; ?>" class="btn btn-success">
                   <span class="glyphicon glyphicon-edit"></span>Edit</button></a>
                   <a href="hapus_mahasiswa.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">
                   <span class="glyphicon glyphicon-remove-sign"></span>Delete</button></a>
                 </td>
               </tr>

             <?php
             }
             ?>

               <!-- fungsi select pada php taruh disini-->

             </tbody>
           </table>
         </div>
       </div>
     </div>
   </body>

</html>
