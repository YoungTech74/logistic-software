<?php
include_once 'connection.php';

// error_reporting(0);
    $error = "";

    if(isset($_POST['proceedBtn'])){

        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);


    

            $query = "SELECT * FROM users WHERE users.username = '".$username."' && users.email = '".$email."' " or die(mysqli_error($conn));
            $result = mysqli_query($conn, $query);
            
            $row = mysqli_fetch_assoc($result);
            
            
            if($row['username'] == $username && $row['email'] == $email){
                $_SESSION['username'] = $row['username'];
                header('location: ./new_password.php');
               
            }else {
              
                    $error = "Invalid Details";
             
            }
        }
       
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Forgot Password</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="./plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./include/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">

<div class="login-box">
 
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">

    <h5 class="login-box-msg">Enter Your Details to Proceed</h5>
        <h5 class="text-danger" style="margin-left: 30%; padding: 5px; font-size: italic;" ><?php echo $error ;?></h5>

      <form action="" method="POST">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="username" placeholder="Username" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="email" placeholder="email" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <div class="row">
          
          <div class="col-4" style="margin: auto; margin-bottom: 10px;">
            <button type="submit" name="proceedBtn" class="btn btn-primary btn-block">Proceed</button>
          </div>
          
        </div>
      </form>
     

      <p class="mb-1">
        <a style="margin-left: 27%;" href="login.php">I Remember my password</a>
      </p>
     
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->




<!-- jQuery -->
<script src="./plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="./plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="./dist/js/adminlte.min.js"></script>
</body>
</html>
