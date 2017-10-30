<?php
// isikan dengan query select data
session_start();

// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: welcome.php");
  exit;
}

 include "koneksi.php";
 $id = $_GET['id'];
 $query = "SELECT * FROM dosen where id_dosen = '$id'";
 $result = mysqli_query($connect, $query) or die(mysqli_error($connect));
 $row = mysqli_fetch_array($result);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Praktikum SBD Modul 4</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/custom.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11 .3/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script type='javascript' src="assets/js/bootstrap.min.js"></script>
  </head>

  <body style="background-color : #fafafa;">
    <br><br>
    <header class="main-header">
      <center><h1 class="blogtitle">CRUD Sederhana dengan PHP dan MYSQL</h1></center>
      <center><h4 class="blogtitle">Praktikum Sistem Basis Data 2017</h4></center>
    </header><br><br>
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
      <div class="row">
        <div class="col-md-12">
          <form method='POST' action='aksi_editdosen.php?id=<?php echo $id; ?>' class='form-horizontal'>
            <h2>Edit Data Dosen</h2>
            <div class="form-group">
              <label class="col-sm-1 control-label">NIDN</label>
              <div class="col-sm-10">
                <input type="text" name='nidn'  class="form-control" value="<?php echo $row['nidn']; ?>">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-1 control-label">Nama</label>
              <div class="col-sm-10">
                <input type="text" name='nama' class="form-control" value="<?php echo $row['nama']; ?>"></textarea>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-1 control-label">Alamat</label>
              <div class="col-sm-10">
                <input type="text" name='alamat' class="form-control" value="<?php echo $row['alamat']; ?>">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-1 control-label">Email</label>
              <div class="col-sm-10">
                <input type="email" name='email' class="form-control" value="<?php echo $row['email']; ?>">
              </div>
            </div>
            <div class="form-group">
              <div class="col-smoffset-1 col-sm-4">
                <button type="submit" name="submit" class="btn btnprimary">Simpan</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
