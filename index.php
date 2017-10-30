<?php require "aksilogin.php";?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="css/main.css" rel="stylesheet" media="screen">
    <script src="js/jquery-2.2.4.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script type="text/javascript" src="js/bootstrap.js"></script>
</head>
<body>
    <div class="container">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="form-signin">
          <center><h1 class="form-signin-heading"><strong>Login</strong><br></h1>
            <h2>Tugas SBD Modul 4
          </h2></center>
          <br>
          <center><img src="assets/img/avatar.png" height="100" width="100"></center>
          <br>
          <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
            <input type="text" name="username"class="form-control" value="<?php echo $username; ?>" placeholder="Username" autofocus>
            <span class="help-block"><?php echo $username_err; ?></span>
          </div>
          <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>" >
            <input type="password" name="password" class="form-control" placeholder="Password">
            <span class="help-block"><?php echo $password_err; ?></span>
          </div>
          <button name="Submit" id="submit" class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
          <p>Belum punya akun? <a href="register.php">Sign up</a>.</p>
        </form>
    </div>
</body>
</html>
