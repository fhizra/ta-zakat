<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SPK-Zakat</title>

  <!-- Custom fonts for this template-->
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body background="img/bg.jpg">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center" style="margin-top: 100px">
      <div class="col-xl-6">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="login-card card-block auth-body mr-auto ml-auto">
              <div class="col-lg-9" style="margin: auto;">
                <div class="p-4">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4"><b>Form Login</b></h1>
                  </div>
                  <form class="user" method="post" action="">
                    <div class="form-group">
                      <input type="text" class="form-control" name="username" placeholder="Username" required="">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control" name="password" placeholder="Password" required="">
                    </div>
                    <div class="row justify-content-center">
                      <button type="submit" name="login" class="btn btn-info" style="width: 40%">Login</button>&ensp;&ensp;
                      <button type="reset" name="reset" class="btn btn-danger" style="width: 40%">Reset</button>
                    </div>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="index.php">Kembali Kehalaman Utama!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  <?php 
    session_start();
    include ('config/koneksi.php');
    if(isset($_POST['login'])) {
    $username   =$_POST['username'];
    $password   =$_POST['password'];

    $query  =mysqli_query($konek,"SELECT * FROM user WHERE username='$username' AND password='$password'"); 
    echo mysqli_error($query);
    $row=mysqli_num_rows($query);
    if ($row > 0) {
    $data = mysqli_fetch_assoc($query);
      $_SESSION['username']   = $username;
      $_SESSION['password']   = $password;
      header("location:admin/index.php");
    }else{
      echo "<script language=javascript>
          window.alert('Username atau Password Salah!');
          window.location='login.php';
          </script>";
    }
  }
  ?>

  </div>


  <!-- Bootstrap core JavaScript-->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="assets/js/sb-admin-2.min.js"></script>

</body>

</html>