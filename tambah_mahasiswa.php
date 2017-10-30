<?php
// Initialize the session
session_start();

// If session variable is not set it will redirect to login page
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
    </header><br><br>
    <div class="col-md-2" align="left">
      <ul class="nav" id="mainmenu">
        <br>
        <li>
          <a class="activemenu" href="mahasiswa.php">
            <i class="fa fa-user fa2x"></i>Mahasiswa</a>
        </li>
        <li>
          <a  href="dosen.php">
            <i class="fa fa-user fa2x"></i>Dosen</a>
        </li>
        <li>
          <a  href="login/logout.php"><i class="glyphicon glyphicon-log-out"></i>Logout</a>
        </li>
      </ul>
    </div>
    <div class= "container col-md-10">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="aksi_tambahmahasiswa.php" class="form-horizontal">
            <h2>Tambah Mahasiswa</h2>
            <div class="form-group">
              <label class="col-sm-1 control-label">NIM</label>
              <div class="col-sm-10">
                <input type="text" name='nim' class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-1 control-label">Nama</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name='nama'>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-1 control-label">Alamat</label>
              <div class="col-sm-10">
                <input type="text" name='alamat' class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-1 control-label">Jenis Kelamin</label>
              <div class="col-sm-10">
                <input type="radio" name="jk" id="jk" value="Laki-laki">Laki-laki &nbsp;
                <input type="radio" name="jk" id="jk" value="Perempuan">Perempuan
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-1 control-label">Doswal</label>
              <div class="col-sm-10">
                <select class="form-control" name='doswal'>
                  <?php include "koneksi.php";
                  $query = "SELECT * FROM dosen";
                  $result = mysqli_query($connect, $query) or die(mysqli_error($connect));
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <option value="<?php echo $row['id_dosen']; ?>">
                      <?php echo $row['nama']; ?>
                    </option>

                <?php
                }
                ?>

                </select>
              </div>
            </div>
            <div class="form-group">
              <div class="col-smoffset-1 col-sm-4">
                <button type='submit' name='submit' class='btn btnprimary'>Simpan</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
