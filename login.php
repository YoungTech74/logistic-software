<?php
include_once 'connection.php';


error_reporting(0);
    $error = "";
    if(isset($_POST['loginBtn'])){
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        $hashPassword = password_hash($password, PASSWORD_DEFAULT);

        if(empty($email)){
            $error = "Email is required!";
        }else if(empty($password)){
            $error = "Password is required!";
        }else {

            $query = "SELECT * FROM users WHERE users.email = '".$email."' " or die(mysqli_error($conn));
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($result);
            
            if($row['email'] == $email){
                $_SESSION['userid'] = $row['id'];
                // $_SESSION['username'] = $row['username'];

                if($row['user_type'] == 1){
                   
                    $_SESSION['admin_user'] = $row['username'];
                    $_SESSION['admin_fullname'] = $row['full_name'];
                header('location: admin/dashboard/index.php');

                }else if($row['user_type'] == 0) {
                    $_SESSION['user'] = $row['username'];
                    $_SESSION['user_id'] = $row['id'];
                    $_SESSION['fullname'] = $row['full_name'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['user_image'] = $row['image'];
                   
                header('location: user/index.php');
                }
               
            }else {
              
                    $error = "Invalid Details";
             
            }
        }
       
      
       
        
      
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Log In</title>

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
        <img src="./user/include/img/download.jpeg" alt="" style="margin-left: 35%; border-radius: 50%; margin-bottom: 5px;">
      <h1 class="login-box-msg">Sign In</h1>
        <h5 class="text-danger m-auto" ><?php echo $error ;?></h5>
      <form action="" method="POST">
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <div class="row">
          
          <div class="col-4" style="margin: auto; margin-bottom: 10px;">
            <button type="submit" name="loginBtn" class="btn btn-primary btn-block">Sign In</button>
          </div>
          
        </div>
      </form>
     

      <p class="mb-1">
        <a style="margin-left: 27%;" href="forgot_password.php">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a style="margin-left: 26%;" href="registration.php">Create New Account</a>
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
