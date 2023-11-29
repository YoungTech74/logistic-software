<?php 
// session_start();
// error_reporting(0);
include_once '../connection.php';
 include_once './header.php'; 
 include_once './navbar.php'; 
 include_once './sidebar.php'; 
 
 $courierName = "";
 $courierEmail = "";
 $courierPhone = "";
 $success = "";



 $courier = "SELECT * FROM users WHERE user_type = 1" or die(mysqli_error($conn));
 $query = mysqli_query($conn, $courier);
 while($row = mysqli_fetch_assoc($query)){
    $courierName = $row['full_name'];
    $courierEmail = $row['email'];
    $courierPhone = $row['phone_number'];

 }

//  $getUsername = mysqli_query($conn, "SELECT * FROM use")

 if(isset($_POST['send_package_btn'])){

    $senderName = trim(mysqli_real_escape_string($conn, $_POST['sender_name']));
    $senderEmail = trim(mysqli_real_escape_string($conn, $_POST['sender_email']));
    $senderPhone = trim(mysqli_real_escape_string($conn, $_POST['sender_phone_number']));
    $receiverName = trim(mysqli_real_escape_string($conn, $_POST['receiver_name']));
    $receiverEmail = trim(mysqli_real_escape_string($conn, $_POST['receiver_email']));
    $receiverPhone = trim(mysqli_real_escape_string($conn, $_POST['receiver_phone_number']));
    $courierName = trim(mysqli_real_escape_string($conn, $_POST['courier_name']));
    $courierEmail = trim(mysqli_real_escape_string($conn, $_POST['courier_email']));
    $courierPhone = trim(mysqli_real_escape_string($conn, $_POST['courier_phone_number']));
    $companyName = trim(mysqli_real_escape_string($conn, $_POST['company_name']));



    // upload product image 

    // $file_dir = "../images/";
    // $file_name = $file_dir.basename($_FILES['product_image']['name']);
    // move_uploaded_file($_FILES['product_image']['tmp_name'], $file_name);

    $path = "../images/";
    $fileName = $path.basename($_FILES['product_image']['name']);
    move_uploaded_file($_FILES['product_image']['tmp_name'], $fileName);


          $_SESSION['senderName'] =  $senderName;
          $_SESSION['senderEmail'] =  $senderEmail;
          $_SESSION['senderPhone'] =  $senderPhone;
          $_SESSION['receiverName'] =  $receiverName;
          $_SESSION['receiverEmail'] =  $receiverEmail;
          $_SESSION['receiverPhone'] =  $receiverPhone;
          $_SESSION['courierName'] =  $courierName;
          $_SESSION['courierEmail'] =  $courierEmail;
          $_SESSION['courierPhone'] =  $courierPhone;
          $_SESSION['companyName'] =  $companyName;
          $_SESSION['filename'] =  $fileName; 

          ?>
            <script>
              window.location = './make_payment.php';
            </script>
          <?php

     }
 
 ?>




  <title>Send Package</title>
  

  <style>
  textarea{
    resize: none;
  }
  .main_container {
    width: 80%;
    margin: auto;
  }
</style>

<div class="main_container content-wrapper">
  <div class="col-lg-12 content-wrappe">
    <div class="card card-outline card-primary"><br>
      <span id="getMessage"><?php echo $success; ?></span>
      <div class="card-body">

        <form action="" id="manage-branch" method="POST" enctype="multipart/form-data">
          <h1 style="border-bottom: 2px solid blue; width: 30%; margin-left: 35%; margin-bottom: 10px;">Send a Package</h1>
          <input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
          
          <div class="row mt-5">
            <div class="col-md-12">
              <div id="msg" class=""></div>

              <div class="row">
                  <?php
                    $getUserDetails = mysqli_query($conn, "SELECT * FROM users WHERE users.username = '$_SESSION[user]';");
                    while($user = mysqli_fetch_assoc($getUserDetails)){
                      $username = $user['full_name'];
                      $sender_email = $user['email'];
                      $sender_phone = $user['phone_number'];
                    }
                  ?>
                <div class="col-sm-4 form-group ">
                  <label for="" class="control-label">Sender Name</label>
                  <input type="text" class="form-control" name="sender_name" value="<?php echo $username; ?>" readonly>
                </div>

                <div class="col-sm-4 form-group ">
                  <label for="" class="control-label">Sender Email</label>
                   <input type="text" class="form-control" name="sender_email" value="<?php echo $sender_email; ?>" readonly>
                </div>

                <div class="col-sm-4 form-group ">
                  <label for="" class="control-label">Sender Phone Number</label>
                  <input type="text" class="form-control" name="sender_phone_number" value="<?php echo $sender_phone; ?>" readonly>
                </div>

              </div>


              <div class="row">

                <div class="col-sm-4 form-group ">
                  <label for="" class="control-label">Receiver Name</label>
                  <input type="text" class="form-control" name="receiver_name" required>
                </div>

                <div class="col-sm-4 form-group ">
                  <label for="" class="control-label">Receiver Email</label>
                   <input type="text" class="form-control" name="receiver_email" required>
                </div>

                <div class="col-sm-4 form-group ">
                  <label for="" class="control-label">Receiver Phone Number</label>
                  <input type="text" class="form-control" name="receiver_phone_number" required>
                </div>

              </div>


              <div class="row">

                <div class="col-sm-4 form-group ">
                  <label for="" class="control-label">Courier Name</label>
                  <input type="text" class="form-control" name="courier_name" value="<?php echo $courierName; ?>"  readonly>
                </div>

                <div class="col-sm-4 form-group ">
                  <label for="" class="control-label">Courier Email</label>
                   <input type="text" class="form-control" name="courier_email"  value="<?php echo $courierEmail; ?>" readonly>
                </div>

                <div class="col-sm-4 form-group ">
                  <label for="" class="control-label">Courier Phone Number</label>
                  <input type="text" class="form-control" name="courier_phone_number" value="<?php echo $courierPhone; ?>" readonly>
                </div>

              </div>


                <div class="row">
                <div class="col-sm-4 form-group ">
                  <label for="" class="control-label">Product Image</label>
                  <input type="file" class="form-control" name="product_image" required>
                </div>

                <div class="col-sm-4 form-group ">
                  <label for="" class="control-label">Company Name</label>
                  <input type="text" class="form-control" name="company_name" required>
                </div>



              </div>


            </div>
          </div>

          <div class="card-footer border-top border-info">
        <div class="d-flex w-100 justify-content-center align-items-center">
          <button class="btn btn-flat  bg-gradient-primary mx-2" name="send_package_btn">Next</button>
          <a class="btn btn-flat bg-gradient-secondary mx-2" href="./view_package_list.php">Cancel</a>
        </div>
        </div>
        </form>
      </div>
      
     

    </div>
  </div>    
</section>
  </div>
  </div>
  <!-- /.content-wrapper -->

  <?php include_once 'footer.php'; ?>


</div>
  <?php include_once './include/js_libraries.php'; ?>
</body>
</html>
