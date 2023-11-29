<?php
// session_start();
    include_once '../connection.php';

    $fullnameError = "";
    $usernameError = "";
    $emailError = "";
    $phoneError = "";
    $passwordError = "";
    $confirmPasswordError = "";



    $fullname = "";
    $username = "";
    $email = "";
    $password = "";
    $phone = "";
    $confirm_password = "";

    //--------------------------- get all user records from db ------------------------
    
        $userLogin = $_SESSION['user'];

        $fetchUser = mysqli_query($conn, "SELECT * FROM users WHERE username = '$userLogin'") or die(mysqli_error($conn));
       
        while($row = mysqli_fetch_assoc($fetchUser)){
            $fullname = $row['full_name'];
            $username = $row['username'];
            $email = $row['email'];
            $phone = $row['phone_number'];
            $odd_password = $row['password'];

        }

    
    

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Update Your Profile</title>

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
      <h1 class="login-box-msg">Update Profile</h1>

      <form action="" method="POST" id="formId"  enctype="multipart/form-data">

        <div class="input-group mb">

          <input type="text" class="form-control" name="fullname" placeholder="Full name" value="<?php echo $fullname; ?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
          
        </div>
        <span class="text-danger" style="font-style: italic;"><?php echo $fullnameError; ?></span>


        <div class="input-group mt-3">
          <input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo $username; ?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div> 
        <span class="text-danger" style="font-style: italic;"><?php echo $usernameError; ?></span>

        <div class="input-group mt-3">
          <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $email; ?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <!-- <span class="text-danger" style="font-style: italic;"><?php echo $fullnameError; ?></span> -->

        <div class="input-group mt-3">
          <input type="text" class="form-control" name="phone" placeholder="Phone Number" value="<?php echo $phone; ?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <span class="text-danger" style="font-style: italic;"><?php echo $phoneError; ?></span>

        <div class="input-group mt-3">
          <input type="password" class="form-control" name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          <small style="color: red; font-style: italic;">You can leave this field blank if you don't wish to set it</small>
        </div>
        <!-- <span class="text-danger" style="font-style: italic;"><?php echo $fullnameError; ?></span> -->

        <div class="input-group mt-3">
          <input type="password" class="form-control" name="confirm_password" placeholder="Retype password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          <small style="color: red; font-style: italic;">You can leave this field blank if you don't wish to set it</small>
        </div>
        <!-- <span class="text-danger" style="font-style: italic;"><?php echo $fullnameError; ?></span> -->

        <div class="input-group mt-3">
            <!-- <label for="profile">Upload Profile</label> -->
          <input type="file" id="profile" class="form-profie"  name="profile" required>
        </div>
        


        <div class="row">
          <div class="col-4" style="margin: auto; margin-bottom: 5px;">
            <button type="submit" name="updateBtn" class="btn btn-primary btn-block">Update</button>
          </div>
        </div>

      </form>


      <p ><a href="index.php">Cancel</a></p>
    </div>
   
  </div>
</div>



<?php 
  if(isset($_POST['updateBtn'])){
    $userLogin = $_SESSION['user']; 
    
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);
    

    // --------------------hash password ------------------
    $hashPassword = password_hash($password, PASSWORD_DEFAULT);
    $hashPasswordConfirm = password_hash($confirm_password, PASSWORD_DEFAULT);

    //------------------------------------- upload file ------------------------
    // $allowedFileExt = array('png', 'jpg', 'jpeg');
    // $path = "images/";
    // $valueToInsert = move_uploaded_file($_FILES['profile'], $allowedFileExt, $path);
    

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

    }else if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
            $usernameError = "Please enter Alpha Numberic value";
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
    }else if($password !== $confirm_password){
            $confirmPasswordError = "Password do not match";
        }else if((empty($password)) || (is_null($password)) || (!isset($password)) || ($password === 0)){

          $updateRecord = mysqli_query($conn, "UPDATE users SET full_name ='$fullname', username ='$username', email ='$email', phone_number ='$phone',
          password ='$odd_password', confirm_password ='$confirm_password', image ='$file_name' WHERE username = '$userLogin'") or die(mysqli_error($conn));

              if($updateRecord){?>
              <script>
              alert("Profile Updated Successfully!");
              window.location = '../login.php';
              </script>
              <?php


              }else {?>
              <script>
              alert("Profile was NOT Updated Successfully!");
              window.location = './user_profile.php';
              </script>
              <?php

              }
        }else{

        $updateRecord = mysqli_query($conn, "UPDATE users SET full_name ='$fullname', username ='$username', email ='$email', phone_number ='$phone',
                        password ='$password', confirm_password ='$confirm_password', image ='$file_name' WHERE username = '$userLogin'") or die(mysqli_error($conn));

        if($updateRecord){?>
          <script>
            alert("Profile Updated Successfully!");
            window.location = '../login.php';
          </script>
        <?php
           
            
        }else {?>
          <script>
            alert("Profile was NOT Updated Successfully!");
            window.location = './user_profile.php';
          </script>
        <?php
           
        }
    }

     //------------------------------- error handling on password input field----------------------
}

?>



<!-- jQuery -->
<script src="./plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="./plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="./dist/js/adminlte.min.js"></script>
</body>
</html>
