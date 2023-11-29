<?php
include_once 'connection.php';

// error_reporting(0);
    $error = "";
    $username = "";
    $usernId = $_SESSION['username'];

    $getUserDetails = "SELECT * FROM users WHERE username = '$usernId';" or die(mysqli_error($conn));
    $result2 = mysqli_query($conn, $getUserDetails);

    while($user = mysqli_fetch_assoc($result2)){

        $id = $user['id'];

        $username = $user['username'];
    }

       
if (isset($_POST['newPasswordBtn'])) {
    $new_password = mysqli_real_escape_string($conn, $_POST['new_password']);
    $new_password_confirm = mysqli_real_escape_string($conn, $_POST['new_password_confirm']);


    $new_password_hash = password_hash($new_password, PASSWORD_DEFAULT);
    

    if ($new_password !== $new_password_confirm) {
         $error = 'Password do Not match!';
    } else {
        $updatePassword = "UPDATE users SET password = '$new_password_hash' WHERE id='$id';" or die(mysqli_error($conn));
        $updateResult = mysqli_query($conn, $updatePassword);

        if ($updateResult) {?>
                    <script>
                        alert("Password Updated Successfully!");
                        window.location = './login.php';
                    </script>
                <?php
        } else {?>
                <script>
                    alert("Password was NOT Updated Successfully!");
                    window.location = './new_password.php';
                </script>
                <?php
        }
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

    <h5 class="login-box-msg">Choose New password</h5>
        <h6 class="text-danger" style="margin-left: 20%; padding: 5px; font-size: italic;" ><?php echo $error ;?></h5>

      <form action="" method="POST">

      <div class="input-group mb-3">
          <input type="hidden" class="form-control" name="id" placeholder="Username" required value="<?php echo $id; ?>">
        </div>


        <div class="input-group mb-3">
          <input type="password" class="form-control" name="new_password" placeholder="New Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="password" class="form-control" name="new_password_confirm" placeholder="Confirm Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <div class="row">
          
          <div class="col-4" style="margin: auto; margin-bottom: 10px;">
            <button type="submit" name="newPasswordBtn" class="btn btn-primary btn-block">Change</button>
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
