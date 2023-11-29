<?php
error_reporting(1);
// session_start();
    include_once './connection.php';

    $fullnameError = "";
    $usernameError = "";
    $emailError = "";
    $phoneError = "";
    $passwordError = "";
    $confirmPasswordError = "";

    if(isset($_POST['registrationBtn'])){
       
        $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);


        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);
        

        // --------------------hash password ------------------
        $hashPassword = password_hash($password, PASSWORD_DEFAULT);
        // $hashPasswordConfirm = password_hash($confirm_password, PASSWORD_DEFAULT);


        //------------------------------------- upload file ------------------------
        $file_dir = "../images/";
        $file_name = $file_dir.basename($_FILES['profile']['name']);
        move_uploaded_file($_FILES['profile']['tmp_name'], $file_name);


        //------------------------------- error handling on fullname input field----------------------
        if(empty($fullname)){
            $fullnameError = 'Full name is required!';
        }else if(!preg_match("/^[a-z A-Z]*$/", $fullname)){
                $fullnameError = "Please enter only alphabetic values";

            }else if(empty($username)){
                $usernameError = "Username is required!";

        }else if(!preg_match("/^[a-z A-Z]*$/", $username)){
                $usernameError = "Please enter Alphabetic value";

            }else if(empty($email)){
            $emailError = "Email is required!";
        }else if(!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email)){
                $emailError = "Enter a valid email";
            }else if(empty($phone)){
            $phoneError = "Phone Number is required!";
        }else if(!preg_match("/^[0-9]*$/", $phone)){
                $phoneError = "Please enter Numberic value";

            }else if(strlen($phone) != 11){
                $phoneError = "Your phone number must not be less or greater than 11";

            }else if(empty($password)){
            $passwordError = "Password is required";
            
        }else if(empty($confirm_password)){
                $confirmPasswordError = "Password is required!";

        }else if($password != $confirm_password){
                  $confirmPasswordError = "Password do not match";
            }else{
    
            $sql = mysqli_query($conn, "INSERT INTO users 
            VALUES(0, '$fullname', '$username', '$email', '$phone', 'No gift card today', 0, '$hashPassword', '$file_name', 0)") or die(mysqli_error($conn));

            if($sql){?>
                <script>
                  alert("Your Registration is successfull.");
                  window.location = './login.php';
                </script>
            <?php
                
            }else {?>
              <script>
                alert("An Error occured during your Registration.");
                window.location = './registration.php';
              </script>
          <?php
            }
        }

         //------------------------------- error handling on password input field----------------------
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registration Page</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="./plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./include/css/adminlte.min.css">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  

  <div class="card">
    <div class="card-body register-card-body">
      <h1 class="login-box-msg">Sign Up</h1>

      <form action="" method="POST" id="formId"  enctype="multipart/form-data">

        <div class="input-group mb">

          <input type="text" class="form-control" name="fullname" placeholder="Full name" >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
          
        </div>
        <span class="text-danger" style="font-style: italic;"><?php echo $fullnameError; ?></span>


        <div class="input-group mt-3">
          <input type="text" class="form-control" name="username" placeholder="Username" >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div> 
        <span class="text-danger" style="font-style: italic;"><?php echo $usernameError; ?></span>

        <div class="input-group mt-3">
          <input type="email" class="form-control" name="email" placeholder="Email" >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <span class="text-danger" style="font-style: italic;"><?php echo $emailError; ?></span>

        <div class="input-group mt-3">
          <input type="text" class="form-control" name="phone" placeholder="Phone Number must be 11 digits" maxlength="11">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <span class="text-danger" style="font-style: italic;"><?php echo $phoneError; ?></span>

        <div class="input-group mt-3">
          <input type="password" class="form-control" name="password" placeholder="Password" >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <span class="text-danger" style="font-style: italic;"><?php echo $passwordError; ?></span>

        <div class="input-group mt-3">
          <input type="password" class="form-control" name="confirm_password" placeholder="Retype password" >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <span class="text-danger" style="font-style: italic;"><?php echo $confirmPasswordError; ?></span>

        <div class="input-group mt-3">
            <!-- <label for="profile">Upload Profile</label> -->
          <input type="file" id="profile" class="form-profie" name="profile" required>
        </div>
        


        <div class="row">
          <div class="col-4" style="margin: auto; margin-bottom: 5px;">
            <button type="submit" name="registrationBtn" class="btn btn-primary btn-block">Register</button>
          </div>
        </div>

      </form>


      <p >Already have an account? &nbsp;&nbsp;<a href="login.php">Login Instead</a></p>
    </div>
   
  </div>
</div>


<script>
    function submitFosrm(e){
        e.preventDefault();
    }
</script>
<!-- jQuery -->
<script src="./plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="./plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="./dist/js/adminlte.min.js"></script>
</body>
</html>
