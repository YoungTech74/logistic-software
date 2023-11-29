<?php 
include_once '../connection.php';
include_once './header.php';
include_once './navbar.php';
include_once './sidebar.php'; 

 
 $success = "";

if(isset($_POST['payment_btn'])){

    $bank_name = trim(mysqli_real_escape_string($conn, $_POST['bank_name']));
    $acct_number = trim(mysqli_real_escape_string($conn, $_POST['acct_number']));
    $card_holder = trim(mysqli_real_escape_string($conn, $_POST['card_holder']));
    $distance = trim(mysqli_real_escape_string($conn, $_POST['distance']));


      $senderName =  $_SESSION['senderName'];
      $senderEmail =  $_SESSION['senderEmail'];
      $senderPhone =  $_SESSION['senderPhone'];
      $receiverName =  $_SESSION['receiverName'];
      $receiverEmail =  $_SESSION['receiverEmail'];
      $receiverPhone =  $_SESSION['receiverPhone'];
      $courierName =  $_SESSION['courierName'];
      $courierEmail =  $_SESSION['courierEmail'];
      $courierPhone =  $_SESSION['courierPhone'];
      $companyName =  $_SESSION['companyName'];
      $fileName =  $_SESSION['filename'];



      
    $pendingPackage = '<p style="background: blue; padding: 5px; border-radius: 8px; text-align: center; color: white">Pending</p>';


 
    //--------------------------------- insert record into db ----------------
    $insertData = "INSERT INTO packages VALUES(0, '$companyName', '$senderName', '$senderEmail', '$senderPhone',
     '$receiverName', '$receiverEmail', '$receiverPhone', '$courierName', '$courierEmail', '$courierPhone', '$fileName', 0, 0, '$pendingPackage', current_timestamp())" or die(mysqli_error($conn));
     $query = mysqli_query($conn, $insertData);

     if($query){
        
      mysqli_query($conn, "INSERT INTO payment VALUES(0, '$_SESSION[user_id]', '$bank_name', '$acct_number', '$card_holder', '$distance', current_timestamp())");

      $success = '<div class="alert alert-success alert-dismissible fade show text-white" style="background: green;">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        Package has been Sent Successfully. Thank You!
    </div>';
        ?>
        <script>
          setTimeout(() => {
            document.getElementById('getMessage').style.display = 'none';
          }, 3000);
        </script>
        <?php

        $sql = "UPDATE admin_messages SET incoming_messages = incoming_messages + 1" or die(mysqli_error($conn));
        $result = mysqli_query($conn, $sql);


        $getAllMessages = mysqli_query($conn, "SELECT SUM(incoming_messages) AS totalMessages FROM admin_messages") or die(mysqli_error($conn));
        while($row = mysqli_fetch_assoc($getAllMessages)){
            $message = $row['totalMessages'];
        }
            $_SESSION['admin_message'] = $message;


            //  $updateSeen = mysqli_query($conn, "UPDATE packages SET seen = 0 WHERE seen != 1") or die(mysqli_error($conn));

//----------------------------------- update new messages record----------------------------------
            $updateNewMessage = "UPDATE admin_messages SET new_messages = new_messages + 1" or die(mysqli_error($conn));
            $query = mysqli_query($conn, $updateNewMessage);

            $getSumOfNewMessages = mysqli_query($conn, "SELECT SUM(new_messages) AS newMessages FROM admin_messages") or die(mysqli_error($conn));
           
            while($getMessages = mysqli_fetch_assoc($getSumOfNewMessages)){
                $newMessages = $getMessages['newMessages'];
            }
            $_SESSION['new_message'] = $newMessages;

          }

   
}

 ?>
  <title>Send a Gift Card</title>
  
 

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
    <span id="getMessages"><?php echo $success; ?></span>
      <div class="card-body">

        <form action="" id="manage-branch" method="POST">

          <div class="row" style="width: 50%; margin-left: 20%;">
            <div class="col-md-12">
              <div id="msg" class=""></div>

              <div class="row">

                <div class="col-sm-6 form-group ">
                  <label for="" class="control-label">Bank Name</label>
                    <input type="text" name="bank_name"  class="form-control">
                </div>

                <div class="col-sm-6 form-group ">
                  <label for="" class="control-label">Acct Number</label>
                    <input type="text" name="acct_number" class="form-control">
                </div>

                <div class="col-sm-6 form-group ">
                  <label for="" class="control-label">Card Holder</label>
                    <input type="text" name="card_holder" class="form-control">
                </div>

                
                <div class="col-sm-6 form-group ">
                  <label class="control-label">Distance</label>
                    <select name="distance" class="form-select">
                      <option>Select Your Distance</option>
                      <option value="N 500">1 Km @ 500</option>
                      <option value="N 1000">2 Km @ 1000</option>
                      <option value="N 1500">3 Km @ 1500</option>
                      <option value="N 2000">4 Km @ 2000</option>
                      <option value="N 2500">5 Km @ 2500</option>
                      <option value="N 3000">6 Km @ 3000</option>
                      <option value="N 3500">7 Km @ 3500</option>
                      <option value="N 4000">8 Km @ 4000</option>
                      <option value="N 4500">9 Km @ 4500</option>
                      <option value="N 5000">10 Km @ 5000</option>
                    
                    </select>
                </div>

                <div class="card-footer border-top border-info">
                <div class="d-flex w-100 justify-content-center align-items-center">
                    <button class="btn btn-flat  bg-gradient-primary mx-2" name="payment_btn">Submit</button>
                    <a class="btn btn-flat bg-gradient-secondary mx-2" href="./dashboard.php">Cancel</a>
                </div>
            </div>

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

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="include/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="dist/js/demo.js"></script> -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="include/js/pages/dashboard.js"></script>
</body>
</html>
